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
use App\Degree;
use App\PapersComments;
use App\Mail\IsrAbstractConfirmation;
use App\Mail\IsrNotification;
use App\Mail\IsrNotificationArabic;
use Illuminate\Http\Request;

class NotificationMailController extends Controller
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
    public function sendmail()
    {
        if(Auth::check()){
            if(Auth::user()->usersboards->count() ==0){
               return redirect()->intended('/mypage');
            }else{
                $filesInFolder = \File::files('mails');
                foreach($filesInFolder as $path)
                {
                    $filename = pathinfo($path)['filename'];
                    $author_id = substr($filename, strrpos($filename, '_') + 1);
                    $author = Author::where('id', '=', $author_id)->first();
                    //Sending Mail
                    $obj = new \stdClass();
                    $obj->author = $author;
                    $obj->sender = 'Conference Secretary';
                    $obj->receiver = $author->degree->degree.' '.$author->lname.' '.$author->fname;
                    $obj->attach = $path;
                    Mail::to($author->email)->cc(['isr_secretariat@unv.tanta.edu.eg'])->send(new IsrAbstractConfirmation($obj));
                    // return view('paper_confirmed', compact('papercount','topics'));
                }
            }
        }else{
            return redirect()->intended('/login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function notify()
    {
        if(Auth::check()){
            if(Auth::user()->usersboards->count() ==0){
               return redirect()->intended('/mypage');
            }else{
                // $authors = Author::distinct()->get(['email']);
                 $authors = $array = array();
                // $authors = User::distinct()->get(['email']);         
                foreach($authors as $author)
                {
                    //Sending Mail
                    $obj = new \stdClass();
                    // //Attachment
                    // $obj->attach1 = 'ISR-Program.pdf';
                    // $obj->attach2 = 'ISR-Schedule.pdf';
                    // //
                    $obj->sender = 'Conference Secretary';
                    Mail::to($author)->cc(['isr_secretariat@unv.tanta.edu.eg'])->send(new IsrNotification($obj));

                    //Sending Mail
                    // $obj = new \stdClass();
                    // $obj->sender = 'Conference Secretary';
                    // Mail::to($author)->cc(['isr_secretariat@unv.tanta.edu.eg'])->send(new IsrNotificationArabic($obj));
                    // // return view('paper_confirmed', compact('papercount','topics'));
                }
            }
        }else{
            return redirect()->intended('/login');
        }
    }
    
}
