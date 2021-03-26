<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IsrAbstractConfirmation extends Mailable
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
                    ->view('mails.notification_mail')
                    ->attach($this->obj->attach, [
                              'as' => "ISR_19_".$this->obj->author->lname.$this->obj->author->fname .".pdf",
                      ]);
    }
}
