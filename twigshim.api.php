<?php

/**
 * @file
 * API for the Twigshim module.
 */

/**
 * Initializes the Twigshim Twig loader.
 *
 * @param Twig_Loader_Filesystem $loader
 *   The Twig loader that is being initialized.
 */
function hook_twigshim_loader(Twig_Loader_Filesystem $loader) {
  // Add the @mymodulecomponents namespace.
  $path = drupal_get_path('module', 'mymodule');
  $twig->addPath($path . '/components', 'mymodulecomponents');
}

/**
 * Initializes the Twigshim Twig environment.
 *
 * @param Twig_Environment $twig
 *   The Twig environment that is being initialized.
 */
function hook_twigshim_environment(Twig_Environment $twig) {
}
