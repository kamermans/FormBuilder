<?php
/**
 * Author: Wesley
 * Date: 06-Jan-15
 * Time: 13:44
 */

use Wesleyalmeida\Forms\FormBuilder\FormBuilder;
use Illuminate\Support\Facades\Form;

class LoginForm {

    public static function form($values = array()) {

        $helper = new FormBuilder();

        $options = [
            'class' => 'form-control',
        ];

        // Username
        $name    = 'username';
        $old     = $helper->getOldValueFromValues($name, $values);

        $options['id'] = $name;
        $options['placeholder'] = "Type your username";

        $username = Form::text($name, $old, $options);
        $helper->addLabelField($name,"Username:", $username);

        // Password
        $name = 'password';

        $options['id'] = $name;
        $options['placeholder'] = "Your password here";

        $password = Form::password($name, $options);
        $helper->addLabelField($name,"Password:", $password);

        // Remember ME
        $name          = 'remember_me';
        $options['id'] = $name;
        $remember      = Form::checkbox($name, $name, array('class'=>'remember_me_check'));
        $helper->addLabelField($name, "Remember Me", $remember);

        return $helper;
    }
}