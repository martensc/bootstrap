<?php

include_once(dirname(__FILE__) . '/includes/bootstrap.inc');

function bootstrap_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['themedev'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme development settings'),
  );

  $form['themedev']['bootstrap_rebuild_registry'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Rebuild theme registry on every page.'),
    '#default_value' => theme_get_setting('bootstrap_rebuild_registry'),
    '#description'   => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>.') . '<div class="alert alert-error">' . t('WARNING: this is a huge performance penalty and must be turned off on production websites. ') . l('Drupal.org documentation on theme-registry.', 'http://drupal.org/node/173880#theme-registry'). '</div>',
  );

  $form['up'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme jQuery settings'),
  );

  $form['up']['up_jquery'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Load in a newer version of jQuery for front-end only.'),
    '#default_value' => theme_get_setting('up_jquery'),
    '#description'   => t('By enabling, you will be running the latest stable version of jQuery (1.9.1) on the front-end of the site. It allows for more flexability and ability to utilize the Twitter Bootstrap javascript library.') 
      . '<div class="alert alert-error">' . t('WARNING: some Drupal contrib modules are built to run on an older version of jQuery.'). '</div>',
  );
}