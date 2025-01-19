<?php

namespace App\Http\Controllers;

use App\Models\HomePageSetting;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $homepagesetting = HomePageSetting::first();
        return view('home.index',compact('homepagesetting'));
    }
}
