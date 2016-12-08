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
    return 'derekderaps/twigshim';
  }

  /**
   * {@inheritdoc}
   */
  public function getFilters()
  {
    return array(
      // Translation filters.
      new \Twig_SimpleFilter('t', 't', array('is_safe' => array('html'))),
      new \Twig_SimpleFilter('trans', 't', array('is_safe' => array('html'))),
      // The "raw" filter is not detectable when parsing "trans" tags. To detect
      // which prefix must be used for translation (@, !, %), we must clone the
      // "raw" filter and give it identifiable names. These filters should only
      // be used in "trans" tags.
      // @see TwigNodeTrans::compileString()
    );
  }
}
