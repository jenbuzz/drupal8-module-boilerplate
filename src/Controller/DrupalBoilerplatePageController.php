<?php

namespace Drupal\drupal8_module_boilerplate\Controller;

use Drupal\Core\Controller\ControllerBase;

class DrupalBoilerplatePageController extends ControllerBase
{
    public function content()
    {
        return [
            '#theme' => 'drupalboilerplate-page',

            // Disabling cache for this page
            '#cache' => [
                'max-age' => 0,
            ],
        ];
    }
}
