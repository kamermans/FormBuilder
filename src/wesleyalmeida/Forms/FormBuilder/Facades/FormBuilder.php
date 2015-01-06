<?php
/**
 * Author: Wesley
 * Date: 06-Jan-15
 * Time: 13:39
 */

namespace Wesleyalmeida\Forms\FormBuilder\Facades;

use Illuminate\Support\Facades\Facade;

class FormBuilder extends Facade {

    protected static function getFacadeAccessor() {
        return 'form-builder';
    }
}

