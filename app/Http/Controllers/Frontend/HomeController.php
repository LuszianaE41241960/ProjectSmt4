<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pastikan nama folder menggunakan titik (.) bukan backslash (\)
        return view('frontend.layouts.home'); 
    }
}