<?php
/**
 * Author: Wesley
 * Date: 06-Jan-15
 * Time: 18:53
 */

class MyController extends BaseController {



    public function showLogin() {
        if (Auth::check()) {
            return Redirect::route('home');
        }

        $title = "Login to Control Panel";

        $form = LoginForm::form();

        $this->layout          = View::make('layouts.login');
        $this->layout->title   = $title;
        $this->layout->content = View::make('home.login')
                                     ->withTitle($title)
                                     ->withForm($form);
    }

}