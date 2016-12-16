<?php

/**
 * @file
 * Provides the Twig extensions for the Twigshim Drupal module.
 */

namespace Drupal\twigshim;

/**
 * Extension for Twig that loads all the required filters for the Twigshim module.
 */
class TwigshimTwigExtension extends \Twig_Extension {
  /**
   * Return extension name
   *
   * @return string
   */
  public function getName()
  {
    // TODO: Rename the name once composer.json is updated?
    return 'kalamuna/twigshim';
  }

  /**
   * {@inheritdoc}
   */
  public function getFilters()
  {
    return array(
      new \Twig_SimpleFilter('t', 't', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('trans', 't', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('safe_join', [$this, 'safeJoin'], ['needs_environment' => TRUE, 'is_safe' => ['html']]),
      new \Twig_SimpleFilter('clean_class', 'drupal_html_class', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('slug', 'drupal_html_class', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('clean_id', 'drupal_html_id', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('format_date', 'format_date', array('is_safe' => array('html'))),
    );
  }

  /**
   * Joins several strings together safely.
   *
   * @param \Twig_Environment $env
   *   A Twig_Environment instance.
   * @param mixed[]|\Traversable|null $value
   *   The pieces to join.
   * @param string $glue
   *   The delimiter with which to join the string. Defaults to an empty string.
   *   This value is expected to be safe for output and user provided data
   *   should never be used as a glue.
   *
   * @return string
   *   The strings joined together.
   */
  public function safeJoin(\Twig_Environment $env, $value, $glue = '') {
    if ($value instanceof \Traversable) {
      $value = iterator_to_array($value, FALSE);
    }
    return implode($glue, $value);
  }
}
