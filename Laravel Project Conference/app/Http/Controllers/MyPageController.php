<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\FullPaperSubmissionEmail;
use App\Topic;
use App\Paper;
use App\User;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MyPageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MyPage Controller
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
            if(strpos(URL::previous(),"previous")!== false && strpos(URL::previous(),"questioner")!== false){
                return redirect()->intended('/questioner');
            }else{
                $papers = Paper::with('Authors')->orderBy('papers.id')->where('papers.user_id', '=', Auth::id())->get();
                return view('mypage', compact('papers'));
            }
        }else{
            return redirect()->intended('/login');
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function uploadFullPaper(Request $request)
    {
        $paper = Paper::find($request->get('paperid'));

        if($request->hasFile('fullpaper')) {

            $file = $request->file('fullpaper');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('uploadfull', $fileName); 
            $paper->fullpaper = $fileName;
            $paper->fullpapertype = $request->get('fullpapertype');
            $paper->save();
            
            $authorsList = array();
            $i = 0;
            foreach($paper->authors as $author)
            {
                $authorsList[$i] = $author->email;
                $i= $i+1;
            }
            //Sending Mail
            $obj = new \stdClass();
            $obj->paper = $paper;
            $obj->sender = 'Conference Secretary';
            $obj->receiver = 'authors';
            Mail::to($authorsList)->send(new FullPaperSubmissionEmail($obj));

            return redirect()->intended('/mypage')->with('alert', 'Your full paper uploaded successfully, you can download it using \'Download Full Paper\' button.');
        }else{
            $paper->fullpapertype = $request->get('fullpapertype');
            $paper->save();
            return redirect()->intended('/mypage')->with('alert', 'Your request submitted  successfully.');
        }
    }

}
