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
class DrupalBoilerplateBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $config = $this->getConfiguration();

        return [
            '#theme' => 'drupalboilerplate-block',
            '#configtitle' => !empty($config['drupal_boilerplate_title']) ?
                $config['drupal_boilerplate_title'] : '',
        ];
    }

    public function blockForm($form, FormStateInterface $form_state)
    {
        $form = parent::blockForm($form, $form_state);
    
        $config = $this->getConfiguration();
    
        $form['drupal_boilerplate_title'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Title'),
          '#default_value' => isset($config['drupal_boilerplate_title']) ? $config['drupal_boilerplate_title'] : '',
        ];
    
        return $form;
    }
    
    public function blockSubmit($form, FormStateInterface $form_state)
    {
        parent::blockSubmit($form, $form_state);
    
        $values = $form_state->getValues();
    
        $this->configuration['drupal_boilerplate_title'] = $values['drupal_boilerplate_title'];
    }
}
