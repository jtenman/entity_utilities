<?php

namespace Drupal\entity_utilities\Storage;

trait SqlContentEntityStorageEntityClassRetriever {

  protected function getEntityClass($bundle = NULL) {
    return $this->entityClass;
  }

}
