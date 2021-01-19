<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index(){

        $slider = HomePage::find(1);
        return view('admin.pages.home.slider.index', compact('slider'));
    }


    public function sliderStore(Request $request){

        $slider_num = count($request -> subtitle);

        $slider = [];
        for($i = 0 ; $i < $slider_num; $i++){

            $slide_arry =[

                'slide_code'  => $request -> slider_code[$i],
                'subtitle'  => $request -> subtitle[$i],
                'title'  => $request -> title[$i],
                'btn1_title'  => $request -> btn1_title[$i],
                'btn1_link'  => $request -> btn1_link[$i],
                'btn2_title'  => $request -> btn2_title[$i],
                'btn2_link'  => $request -> btn2_link[$i],
            ];

             array_push($slider, $slide_arry);

        }


        $slider_arry = [

            'svideo'  => $request -> svideo,
            'slider'  => $slider
            ];

            $slider_json = json_encode($slider_arry);

            $slider_data = HomePage::find(1);

            $slider_data -> sliders = $slider_json ;

            $slider_data -> update();


            return redirect() -> back();



    }



























































    public function clientsIndex(){

        $settings = Setting::find(1);

        return view('admin.pages.home.clients.index', compact('settings'));
    }


    public function clientsUpdate(Request $request){

        return $request -> all();

    }
}
