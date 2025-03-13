<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function shop()
    {
        return view('shop');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function services()
    {
        return view('services');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
