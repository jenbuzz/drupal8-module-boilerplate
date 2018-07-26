# Drupal 8 Module Boilerplate

**Create a custom page with routing**
* drupal8_module_boilerplate.routing.yml
* drupal8_module_boilerplate_theme(...) in drupal8_module_boilerplate.module
* src/Controller/DrupalBoilerplatePageController.php
* templates/drupalboilerplate-page.html.twig

**Disable cache for a custom page**
* content() in src/Controller/DrupalBoilerplatePageController.php

**Load CSS and JS**
* drupal8_module_boilerplate.libraries.yml
* drupal8_module_boilerplate_page_attachments(...) in drupal8_module_boilerplate.module

**Customize the user login form**
* drupal8_module_boilerplate.services.yml
* src/Form/NewUserLoginForm.php
* src/Routing/RouteSubscriber.php

**Generate all image styles on image upload**
* drupal8_module_boilerplate_insert(...) in drupal8_module_boilerplate.module