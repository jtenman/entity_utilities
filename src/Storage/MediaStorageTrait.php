<?php

namespace Drupal\entity_utilities\Storage;

use Drupal\Core\Entity\EntityInterface;

trait MediaStorageTrait {

  /**
   * {@inheritdoc}
   */
  public function save(EntityInterface $media) {
    // For backwards compatibility, modules that override the Media entity
    // class, are not required to implement the prepareSave() method.
    // @todo For Drupal 8.7, consider throwing a deprecation notice if the
    //   method doesn't exist. See
    //   https://www.drupal.org/project/drupal/issues/2992426 for further
    //   discussion.
    if (method_exists($media, 'prepareSave')) {
      $media->prepareSave();
    }
    return parent::save($media);
  }

}
