<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    
    public function index() {
        
        return view('new.index', [
            'title' => 'Новая страница'
        ]);
    }
    
    public function showLogin() {
        return view('new.sign-in', [
            'title' => 'Логин'
        ]);
    }
    public function showSignUp() {
        return view('new.sign-up', [
            'title' => 'Регистрация'
        ]);
    }
}
