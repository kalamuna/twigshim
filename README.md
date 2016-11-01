# Twigshim
Shoehorns Twig template compiling into Drupal 7. Especially useful when you
already have twig templates rendering your components in another system (e.g.,
an external styleguide) and don't want to re-implement everything in
PHPTemplate.

## Installation
### Download the Twig library
This project depends on the Twig PHP library, which can be installed one of
three ways:

1.  [Composer Manager](https://www.drupal.org/project/composer_manager)*
    (recommended)
1.  [Composer](https://getcomposer.org/)
1.  [Libraries API](https://www.drupal.org/project/libraries)*

#### via Composer Manager
_This is the recommended installation method._ Install the [Composer
Manager](https://www.drupal.org/project/composer_manager) module* and follow its
installation instructions to generate your `composer.json` and download your
`vendor` dependencies. No extra work is required beyond the steps outlined in
the project.

#### _or_ via Composer
Follow the installation instructions for the main
[Composer](https://getcomposer.org/) project, then `cd` into this module's
directory (probably `sites/all/modules/contrib/twigshim`) and run `composer
install`.

#### _or_ via Libraries API
Install the [Libraries API](https://www.drupal.org/project/libraries) module*
and download the [Twig library](http://twig.sensiolabs.org/) into your libraries
directory (probably `sites/all/libraries`).

### Install the Twig Shim module
Follow the normal Drupal module installation procedure.*

---

\*_For instructions on installing Drupal modules, see the [Drupal.org
documention](https://www.drupal.org/docs/7/extending-drupal-7/installing-contributed-modules-find-import-enable-configure)._

## Usage
If your templates live anywhere other than in the `templates` subdirectory of
your default theme, visit `/admin/conig/development/twigshim` and set the
appropriate path. All your template references resolve relative to this path. Do
not include leading or trailing slashes.

The main Twig Shim function is `twigshim_render()`. Call this with your template
path (relative to the templates directory you just set) and an optional array of
variables to be used in the template. Example:
```
/**
 * Implements hook_block_view().
 */
function mymodule_block_view($delta = '') {
  switch ($delta) {

    // Render the header block.
    case 'myblock':
      return twigshim_render('chrome/header.twig', array(
        'campaign'  => variable_get('mysite_current_campaign', 'Donate now!'),
        'hidePopup' => !user_is_anonymous(),
      ));
      break;
  }
}
```

When rendering an entity, use the helper function `twigshim_render_entity()` to
automatically pull each of the entity's fields and properties into the variables
array. It strips `field_` from the front of each key, facilitating the re-use of
variables across both your style guide and implementation.
```
/**
 * Implements theme_HOOK() for paragraphs_item__button().
 */
function mytheme_paragraphs_item__button(&$vars) {

  // Get a wrapper for the button entity.
  $button = entity_metadata_wrapper('paragraphs_item', $vars['paragraphs_item']);

  // Set values for any fields that don't follow the standard format.
  $template_vars['href'] = $button->field_href->url->value();

  return twigshim_render_entity('paragraphs_item', $button, 'button/button.twig', $template_vars);
}
```
Note that it is the caller's responsibility to properly sanitize all variables
before passing into Twig Shim. See the Drupal.org documentation on [writing
secure code](http://drupal.org/writing-secure-code) and the [sanitisation
functions](https://api.drupal.org/api/drupal/includes!common.inc/group/sanitization/7.x).
