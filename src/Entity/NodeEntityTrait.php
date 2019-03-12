<?php

namespace Drupal\entity_utilities\Entity;

use Drupal\Core\Entity\EntityStorageInterface;

/**
 * Provides common Node entity methods.
 *
 * @see \Drupal\node\Entity\Node
 */
trait NodeEntityTrait {

  /**
   * {@inheritdoc}
   */
  public function postSave(EntityStorageInterface $storage, $update = TRUE) {
    // Update the node access table for this node, but only if it is the
    // default revision. There's no need to delete existing records if the node
    // is new.
    if ($this->isDefaultRevision()) {
      /** @var \Drupal\node\NodeAccessControlHandlerInterface $access_control_handler */
      $access_control_handler = \Drupal::entityManager()->getAccessControlHandler('node');
      $grants = $access_control_handler->acquireGrants($this);
      \Drupal::service('node.grant_storage')->write($this, $grants, NULL, $update);
    }

    // Reindex the node when it is updated. The node is automatically indexed
    // when it is added, simply by being added to the node table.
    if ($update) {
      node_reindex_node_search($this->id());
    }
  }

}
