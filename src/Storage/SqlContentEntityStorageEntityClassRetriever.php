<?php

namespace Drupal\entity_utilities\Storage;

/**
 * A utility trait for retrieving the entity class.
 *
 * Implementors of this trait should derived from Drupal core's
 * Drupal\Core\Entity\Sql\SqlContentEntityStorage class. This allows for modules
 * to easily override and adapt the implementation in which an entity class is
 * retrieved.
 *
 * For example the Discoverable Entity Bundle Class module overrides
 * the core provided SqlContentEntityStorage class enhancing entity classes. See
 * the usage: http://github.com/amcgowanca/discoverable_entity_bundle_classes.
 *
 * @see \Drupal\Core\Entity\Sql\SqlContentEntityStorage
 */
trait SqlContentEntityStorageEntityClassRetriever {

  /**
   * Returns the entity class.
   *
   * @param null $bundle
   *   (optional) The entity bundle name to retrieve the class for.
   *
   * @return string
   *   The entity class name.
   */
  public function getEntityClass(?string $bundle = NULL): string {
    return $this->entityClass;
  }

}
