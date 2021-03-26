<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Topic;
use App\Paper;
use App\User;
use App\Author;
use App\PapersComments;
use App\Mail\IsrAbstractAcceptance;
use Illuminate\Http\Request;

class PaperConfirmedController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PaperConfirmed Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->usersboards->count() ==0){
               return redirect()->intended('/mypage');
            }else{
                $topics = array();
                $papercount = 0;
                foreach(Auth::user()->usersboards as $board){
                    $topics[] = $board->topic;
                    $papercount = $papercount + $board->topic->papers->count();
                }
                // $papers = Paper::with('Authors')->orderBy('papers.id')->where('papers.topic_id', '=', Auth::user()->board)->get();
                // $topic = Topic::where('id', '=', Auth::user()->board)->first();
                 return view('paper_confirmed', compact('papercount','topics'));
            }
        }else{
            return redirect()->intended('/login');
        }
    }
    
}
