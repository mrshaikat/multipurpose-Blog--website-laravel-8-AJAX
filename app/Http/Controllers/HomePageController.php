<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index(){



        return view('admin.pages.home.slider.index');
    }



























































    public function clientsIndex(){

        $settings = Setting::find(1);

        return view('admin.pages.home.clients.index', compact('settings'));
    }


    public function clientsUpdate(Request $request){

        return $request -> all();

    }
}
