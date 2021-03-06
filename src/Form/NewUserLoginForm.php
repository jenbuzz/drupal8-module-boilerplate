<?php

namespace Drupal\drupal8_module_boilerplate\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Form\UserLoginForm;

class NewUserLoginForm extends UserLoginForm
{
    public function validateFinal(array &$form, FormStateInterface $form_state)
    {
        $flood_config = $this->config('user.flood');
        $flood_control_user_identifier = $form_state->get('flood_control_user_identifier');

        if (!$form_state->get('uid')) {
            $this->flood->register('user.failed_login_ip', $flood_config->get('ip_window'));

            $flood_control_user_identifier = $form_state->get('flood_control_user_identifier');
            if ($flood_control_user_identifier) {
                $this->flood->register(
                    'user.failed_login_user',
                    $flood_config->get('user_window'),
                    $flood_control_user_identifier
                );
            }

            $flood_control_triggered = $form_state->get('flood_control_triggered');
            if ($flood_control_triggered) {
                if ($flood_control_triggered == 'user') {
                    $form_state->setErrorByName('name', 'Login Error!');
                } else {
                    $form_state->setErrorByName('name', 'Login Error!');
                }
            } else {
                $user_input = $form_state->getUserInput();
                $query = isset($user_input['name']) ? ['name' => $user_input['name']] : [];
                $form_state->setErrorByName('name', 'Login Error!', [
                    ':password' => $this->url(
                        'user.pass',
                        [],
                        [
                            'query' => $query,
                        ]
                    ),
                ]);
                $accounts = $this->userStorage->loadByProperties(['name' => $form_state->getValue('name')]);
                if (!empty($accounts)) {
                    $this->logger('user')->notice('Login attempt failed for %user.', [
                        '%user' => $form_state->getValue('name'),
                    ]);
                } else {
                    $this->logger('user')->notice('Login attempt failed from %ip.', [
                        '%ip' => $this->getRequest()->getClientIp(),
                    ]);
                }
            }
        } elseif ($flood_control_user_identifier) {
            $this->flood->clear('user.failed_login_user', $flood_control_user_identifier);
        }
    }
}
