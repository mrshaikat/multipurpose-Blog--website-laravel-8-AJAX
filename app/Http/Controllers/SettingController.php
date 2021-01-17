<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{




    public function logoIndex(){

        $logo = Setting::find(1);

        return view('admin.settings.logo.index', compact('logo'));
    }

    public function logoUpdate(Request $request){

        $logo = $request -> file('logo');
        $old_logo = $request -> old_logo ;
        $logo_width = $request -> logo_width ;

        $logo_name = '';

        if($request -> hasFile('logo')){

            $logo_name = md5(time().rand()).'.'. $logo ->getClientOriginalExtension();

            $logo -> move(\public_path('admin/media/settings/logo'), $logo_name);

            unlink('admin/media/settings/logo'. '/'.$old_logo );

        }else{

            $logo_name = $old_logo;
        }

        $logo_update = Setting::find(1);

        $logo_update -> logo_name = $logo_name;
        $logo_update -> logo_width = $logo_width;

        $logo_update -> update();

        return redirect() -> back() -> with('success', 'Logo Update Successfull');




    }


}
