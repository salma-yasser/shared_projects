<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FullPaperSubmissionEmail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The demo object instance.
     *
     * @var obj
     */
    public $obj;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($obj)
    {
        $this->obj = $obj;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('isr-19@unv.tanta.edu.eg')
                    ->view('mails.fullpaper_submission_mail')
                    ->attach(public_path('/uploadfull').'/'.$this->obj->paper->fullpaper, [
                              'as' => $this->obj->paper->title .".". substr(strrchr($this->obj->paper->fullpaper, "."), 1),
                      ]);
    }
}
