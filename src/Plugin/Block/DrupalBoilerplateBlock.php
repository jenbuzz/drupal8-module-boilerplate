<?php

namespace Drupal\drupal8_module_boilerplate\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Drupal Boilerplate' block.
 *
 * @Block(
 *   id = "drupalboilerplate_block",
 *   admin_label = @Translation("Drupal boilerplate block"),
 * )
 */
class DrupalBoilerplateBlock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#theme' => 'drupalboilerplate-block',
        );
    }

}
