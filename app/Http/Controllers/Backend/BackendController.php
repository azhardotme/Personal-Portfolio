<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }


    public function service()
    {
        return view('backend.service');
    }

    public function portfolio()
    {
        return view('backend.portfolio');
    }


    public function about()
    {
        return view('backend.about');
    }

    public function contact()
    {
        return view('backend.contact');
    }
}
