<?php

namespace Drupal\plugin_test\Plugin\Annotation;

use Drupal\Component\Annotation\AnnotationBase;

/**
 * Defines a Sphynx Plugin annotation.
 *
 * @Annotation
 */
class PluginExample extends AnnotationBase {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * Another plugin metadata.
   *
   * @var string
   */
  public $custom;

  /**
   * {@inheritdoc}
   */
  public function get() {
    return [
      'id' => $this->id,
      'Sphynx' => $this->custom,
      'class' => $this->class,
      'provider' => $this->provider,
    ];
  }

}
