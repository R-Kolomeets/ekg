<?php

class UserController extends Controller {
    
    public function home() {
        return View::make('home.index')->with('title', Lang::get('locale.home_title'));
    }
    
    public function signup() {
        return View::make('signup.index')->with('title', Lang::get('locale.signup_title'));
    }
    
    public function signupProcess() {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:6|max:24|confirmed',
            'password_confirmation' => 'required|min:6|max:24'
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->passes()) {
            $user = new User();
            if($user->register(array('login' => Input::get('email'), 'password' => Hash::make(Input::get('password'))))) {
                return View::make('signup.confirm')->with('title', Lang::get('locale.signup_confirm'));
            }
        } else {
            return View::make('signup.index')->with('title', Lang::get('locale.signup_title'))->with('messages', $validator->messages());
        }
    }
}