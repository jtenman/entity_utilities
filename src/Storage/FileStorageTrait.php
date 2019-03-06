<?php

namespace Drupal\entity_utilities\Storage;

/**
 * Provides Drupal core's FileStorage class methods.
 *
 * @see \Drupal\file\FileStorage
 */
trait FileStorageTrait {

  /**
   * {@inheritdoc}
   */
  public function spaceUsed($uid = NULL, $status = FILE_STATUS_PERMANENT) {
    $query = $this->database->select($this->entityType->getBaseTable(), 'f')
      ->condition('f.status', $status);
    $query->addExpression('SUM(f.filesize)', 'filesize');
    if (isset($uid)) {
      $query->condition('f.uid', $uid);
    }
    return $query->execute()->fetchField();
  }

}
