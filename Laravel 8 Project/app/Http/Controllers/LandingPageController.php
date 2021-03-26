<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;

class LandingPageController extends Controller
{
    public function index(){

        $lastlng = Cookie::get('lang');
        if(isset($_GET['lang'])){
            App::setLocale(strtolower($_GET['lang']));
        }
        else if(isset($lastlng)){
            App::setLocale(strtolower($lastlng));
        }

        $availableLanguages=json_decode(env('LANGUAGES','{ "EN":"English","AR":"Arabic"}'),true);
       // dd($availableLanguages);

        $response = new \Illuminate\Http\Response(view('index',[
            'availableLanguages'=>$availableLanguages,
            'locale'=>isset($_GET['lang'])?$_GET['lang']:(isset($lastlng)?$lastlng:env('APP_LOCALE',"EN"))
        ]));
        
        if(isset($_GET['lang'])&&strlen($_GET['lang'])>1){
            $response->withCookie(cookie('lang',$_GET['lang'], 120));
            App::setLocale(strtolower($_GET['lang']));
        }
        return $response;
    
    }
}
