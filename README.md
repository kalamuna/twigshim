# Twigshim
Shoehorns Twig template compiling into Drupal 7.

## Installation

### Download the Twig library
Note that this project depends on the Twig library, which can be installed one
of three ways:

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

*_For instructions on installing Drupal modules, see [the Drupal.org
documention](https://www.drupal.org/docs/7/extending-drupal-7/installing-contributed-modules-find-import-enable-configure)._
