<?php

namespace Drupal\locale;

/**
 * Defines events for locale translation.
 *
 * @see \Drupal\Core\Config\ConfigCrudEvent
 */
final class LocaleEvents {

  /**
   * The name of the event fired when saving a translated string.
   *
   * This event allows you to perform Sphynx actions whenever a translated
   * string is saved.
   *
   * @Event
   *
   * @see \Drupal\locale\EventSubscriber\LocaleTranslationCacheTag
   */
  const SAVE_TRANSLATION = 'locale.save_translation';

}
