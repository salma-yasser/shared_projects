<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;

    public $table = 'contactus';

	public $fillable = ['name','email','phone','message'];

	/**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    // public function routeNotificationForMail($notification)
    // {
    //     // Return email address only...
    //     return env("CONTACT_MAIL");
    // }

}
