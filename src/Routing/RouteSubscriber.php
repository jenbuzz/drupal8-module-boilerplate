<?php

namespace Drupal\drupal8_module_boilerplate\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

    /**
     * {@inheritdoc}
     */
    protected function alterRoutes(RouteCollection $collection) {
        if ($route = $collection->get('user.login')) {
            $route->setDefault('_form', '\Drupal\drupal8_module_boilerplate\Form\NewUserLoginForm');
        }
    }
}
