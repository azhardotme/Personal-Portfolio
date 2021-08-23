<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\service;
use App\Models\Portfolio;
use App\Models\About;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $main = Main::first();
        $service = service::all();
        $portfolio = Portfolio::all();
        $about = About::all();
        return view('frontend.index', compact('main', 'service', 'portfolio', 'about'));
    }
}
