<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function IndexView(){
        return view('welcome');
    }
    public function PostView(){
        return view('post');
    }
    public function ListView(){
        return view('list');
    }
    public function LoginView(){
        return view('login');
    }

}
