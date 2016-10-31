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
    '#type'          => 'textfield',
    '#title'         => t('Twig templates path'),
    '#default_value' => variable_get('twigshim_templates'),
    '#description'   => t('Define the root directory of your twig templates (the files themselves may be in sub-folders). Do not add leading or trailing slashes.<br><strong>Leave empty to use the <em>templates</em> directory of your default theme.<strong>'),
  );
  return system_settings_form($form);
}
