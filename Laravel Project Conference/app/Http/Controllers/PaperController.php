<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\DigestSubmissionEmail;
use App\Paper;
use App\User;
use App\Author;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Paper Controller
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'topic_id' => 'required',
            'abstract' => 'required|string|max:1500',
            'file' => 'required|file|mimes:pdf,doc,docx,zip|max:5242880',
            'authornumber' => 'required|integer|min:1|max:10',
            'mainauthor' => 'required',
        ]);

        $authornumber = (int)$request->input("authornumber");

        for($i = 0;$i<$authornumber;$i++)
        {
            $this->validate($request, [
            'fname'.$i => 'required|string|max:255',
            'lname'.$i => 'required|string|max:255',
            'degree_id'.$i => 'required',
            'affiliation'.$i => 'required|string|max:255',
            'email'.$i => 'required|string|email|max:255',
        ]);
        }

        $paper = new Paper();

        $paper->title = $request->input("title");
        $paper->abstract = $request->input("abstract");
        $file = $request->file('file');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('upload', $fileName); 
        $paper->file = $fileName;
        $paper->main_author = $request->input("mainauthor");
        $paper->user_id = Auth::id();
        $paper->topic_id = (int)$request->input("topic_id");

        $paper->save();


        $authorsList = array();
        for($i = 0;$i<$authornumber;$i++)
        {
            $author = new Author();
            $author->fname = $request->input("fname".$i);
            $author->lname = $request->input("lname".$i);
            $author->degree_id = (int)$request->input("degree_id".$i);
            $author->affiliation = $request->input("affiliation".$i);
            $author->email = $request->input("email".$i);
            $author->paper_id = $paper->id;
            $author->save();
            $authorsList[$i] = $author->email;
        }
        // $authorsList = substr($authorsList, 1); //remove first ,

        //Sending Mail
        $paperSubmitted = Paper::with('Authors','PapersComments')->where('papers.id', '=', $paper->id)->first();
        $obj = new \stdClass();
        $obj->paper = $paperSubmitted;
        $obj->sender = 'Conference Secretary';
        $obj->receiver = 'authors';
        Mail::to($authorsList)->send(new DigestSubmissionEmail($obj));

        return redirect()->intended('/mypage');
    }
}
