<?php

/**
 * @file
 * API for the Twigshim module.
 */

/**
 * Initializes the Twigshim Twig environment.
 *
 * @param $twig
 *   The Twig environment that is being initialized.
 */
function hook_twigshim_environment($twig) {
  // Add the @mymodulecomponents namespace.
  $path = drupal_get_path('module', 'mymodule');
  $twig->addPath($path . '/components, 'mymodulecomponents');
}
