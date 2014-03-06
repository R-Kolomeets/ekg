<?php

class UserController extends Controller {
    
    public function home() {
        return View::make('home.index');
    }
}