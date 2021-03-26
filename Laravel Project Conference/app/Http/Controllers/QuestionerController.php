<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\FullPaperSubmissionEmail;
use App\Topic;
use App\Questioners;
use App\User;
use App\Author;
use Illuminate\Http\Request;

class QuestionerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Questioner Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

     /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        if(Auth::check()){
            // Auth::user()->questioners()->truncate();
            Questioners::where('user_id', Auth::user()->id)->delete();
            
            // Personal
            $questioner = new Questioners();
            $questioner->user_id= Auth::user()->id;
            $questioner->is_attend = is_null($request->input('attend_personally'))?0:1;
            if($questioner->is_attend){
                if($request->input('personal_companion')){
                    $questioner->companion = $request->input('personal_companion_many');
                }
                if($request->input('personal_transportation')){
                    $questioner->transportation = $request->input('transportation_where0');
                }
                $questioner->fullname = is_null($request->input('personal_fullname'))?Auth::user()->fname.' '.Auth::user()->lname:$request->input('personal_fullname');
            }
            $questioner->save();

            // Couthors
            if($request->input('attend_coauthors')){
                $coauthors_many = $request->input('coauthors_many');

                for($i = 1;$i<=$coauthors_many;$i++){
                    $questioner = new Questioners();
                    $questioner->user_id= Auth::user()->id;
                    $questioner->is_attend = 1;
                    if($request->input('coauthors_companion_'.$i)){
                        $questioner->companion = $request->input('coauthors_companion_many_'.$i);
                    }
                    if($request->input('coauthors_transportation_'.$i)){
                        $questioner->transportation = $request->input('transportation_where'.$i);
                    }
                    $questioner->fullname = $request->input('coauthors_fullname_'.$i);
                    $questioner->save();
                }
            }
            return redirect()->intended('/mypage')->with('alert', 'Your request submitted  successfully.');
        }else{
            return redirect()->intended('/login');
        }
    }

}
