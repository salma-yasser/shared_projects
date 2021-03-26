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

class PaperCommitteeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PaperCommittee Controller
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
                 return view('paper_committee', compact('papercount','topics'));
            }
        }else{
            return redirect()->intended('/login');
        }
    }

    
    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $paperid
     * @param  string  $comment
     * @return Response
     */
    public function sendComment(Request $request)
    {
        // die("here");
        if(Auth::check()){
            $papercomment = new PapersComments;

            $papercomment->paper_id = $request->get('paperid');
            $papercomment->user_id = Auth::user()->id;
            $papercomment->comment = $request->get('comment');

            $papercomment->save();  
            
            return response()->json($papercomment);
          
        }else{
            return redirect()->intended('/login');
        }
    }
	
	
    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $accept
     * @param  string  $paperid
     * @param  string  $userid
     * @return Response
     */
    public function update(Request $request, $accept, $paperid, $userid)
    {
        if(Auth::check()){
            if(Auth::user()->usersboards->count() ==0){
                return redirect()->intended('/mypage');
            }else{
                $paper = Paper::find($paperid);
                $paper->accepted = $accept;
                $paper->accepted_by = $userid;
                $paper->save();

                return redirect()->intended('/paper_committee')->with('alert', 'Paper '.$paper->title.($accept==1?' accepted':' canceled'));
            }
        }else{
            return redirect()->intended('/login');
        }
    }

     /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $accept
     * @param  string  $paperid
     * @param  string  $userid
     * @return Response
     */
    public function confirm(Request $request, $confirm, $paperid, $userid)
    {
        if(Auth::check()){
            if(Auth::user()->usersboards->count() ==0){
                return redirect()->intended('/mypage');
            }else{
                $paper = Paper::find($paperid);
                $paper->confirmed = $confirm;
                $paper->confirmed_by = $userid;
                $paper->save();

                //Sending Mail
                $paperConfirmed = Paper::with('Authors')->where('papers.id', '=', $paper->id)->first();
                $obj = new \stdClass();
                $obj->paper = $paperConfirmed;
                $obj->sender = 'Conference Secretary';
                $obj->receiver = 'authors';
		$emails = array();
                foreach($paperConfirmed->authors as $author){
                    $emails[] = $author->email;
                }
                Mail::to($emails)
                    ->cc(['isr_secretariat@unv.tanta.edu.eg'])
                    ->send(new IsrAbstractAcceptance($obj));


                return redirect()->intended('/paper_committee')->with('alert', 'Paper '.$paper->title.($confirm==1?' confirmed':' canceled'));
            }
        }else{
            return redirect()->intended('/login');
        }
    }
}
