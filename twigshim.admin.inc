<?php

/**
 * @file
 * Admin settings form for the Twig Shim project.
 */

/**
 * Form callback for the twigshim admin settings.
 */
function twigshim_settings_form($form, &$form_state) {
  $form['twigshim_templates'] = array(
    '#type'        => 'textfield',
    '#title'       => t('Path to Twig templates'),
    '#description' => t('Relative to the Drupal base path.'),
    '#required'    => TRUE,
  );
  return system_settings_form($form);
}
