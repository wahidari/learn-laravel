<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// For Static Pages
class PagesController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    //
    public function about(){
        return view('about');
    }
    
    //
    public function service(){
        return view('service');
    }
}
