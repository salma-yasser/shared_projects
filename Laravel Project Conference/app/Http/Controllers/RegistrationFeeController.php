<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Topic;
use App\Paper;
use App\User;
use App\Author;
use App\UsersWorkshops;
use Illuminate\Http\Request;

class RegistrationFeeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RegistraionFee Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
   /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $accept
     * @param  string  $paperid
     * @param  string  $userid
     * @return Response
     */
    public function update(Request $request)
    {
        if(Auth::check()){
            Auth::user()->registration_fee = $request->input('total');
            Auth::user()->is_egyptian = $request->input('nationality') == 'EGP'?1:0;
            Auth::user()->usersworkshops()->truncate();
            foreach($request->input('type') as $value){
              $workshop = new UsersWorkshops;
              $workshop->user_id = Auth::user()->id;
              $workshop->workshop = $value;
              $workshop->save();
            }
            Auth::user()->save();
            return view('registration');
        }else{
            return redirect()->intended('/login');
        }
    }
}
