<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index(Request $request)
        {
            if(auth()->check()) {
                return redirect()->route('auth.dashboard');
            } else {
                return view('home');
            }
        }
}
