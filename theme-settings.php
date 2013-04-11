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

  $form['bootstrap_settings']['bootstrap_js'] = array(
    '#type' => 'fieldset',
    '#title' => t('JavaScript Settings'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_jquery'] = array(
    '#type' => 'fieldset',
    '#title' => t('jQuery'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_jquery']['jquery_update_jquery_version'] = array(
    '#type' => 'select',
    '#title' => t('jQuery Version'),
    '#options' => array(
      '1.5' => '1.5',
      '1.7' => '1.7',
      '1.8' => '1.8',
    ),
    '#default_value' => theme_get_setting('jquery_update_jquery_version') ? theme_get_setting('jquery_update_jquery_version') : '1.7',
    '#description' => t('Select which jQuery version branch to use.'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_jquery']['jquery_update_compression_type'] = array(
    '#type' => 'radios',
    '#title' => t('jQuery compression level'),
    '#options' => array(
      'min' => t('Production (minified)'),
      'none' => t('Development (uncompressed)'),
    ),
    '#default_value' => theme_get_setting('jquery_update_compression_type') ? theme_get_setting('jquery_update_compression_type') : 'min',
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_jquery']['jquery_update_jquery_cdn'] = array(
    '#type' => 'select',
    '#title' => t('jQuery and jQuery UI CDN'),
    '#options'   => array(
      'none' => t('None'),
      'google' => t('Google'),
      'microsoft' => t('Microsoft'),
      'jquery' => t('jQuery'),
    ),
    '#default_value' => theme_get_setting('jquery_update_jquery_cdn') ? theme_get_setting('jquery_update_jquery_cdn') : 'none',
    '#description' => t('Use jQuery and jQuery UI from a CDN. If the CDN is not available the local version of jQuery and jQuery UI will be used.'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_bootstrap_js'] = array(
    '#type' => 'fieldset',
    '#title' => t('Bootstrap JavaScript'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_bootstrap_js']['enable_bootstrap'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Bootstrap JavaScript'),
    '#default_value' => theme_get_setting('enable_bootstrap'),
    '#description' => t('WARNING: If jQuery version 1.5 is set, Bootstrap JavaScript well not work. It requires jQuery 1.7 or higher.'),
  );

  $form['bootstrap_settings']['bootstrap_js']['bootstrap_bootstrap_js']['bootstrap_compression'] = array(
    '#type' => 'radios',
    '#title' => t('Bootstrap compression level'),
    '#options' => array(
      'min' => t('Production (minified)'),
      'none' => t('Development (uncompressed)'),
    ),
    '#default_value' => theme_get_setting('bootstrap_compression') ? theme_get_setting('bootstrap_compression') : 'min',
  );
}