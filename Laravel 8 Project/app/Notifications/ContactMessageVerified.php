<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMessageVerified extends Notification
{
    use Queueable;

    protected $contact;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear '.$this->contact->name)
                    ->subject('Re: Your message to '.env('APP_NAME',"Styltec"))
                    ->line('We hope you are doing well.')
                    ->line('This is a notification that your message has now been received by the '.env('APP_NAME',"Styltec"). ' team.')
                    ->line('Thank you for contacting us. We will check your message and get back to you soon.')
                    ->line('The details of your message are below:')
                    ->line('Name: '.$this->contact->name)
                    ->line('Email: '.$this->contact->email)
                    ->line('Phone: '.$this->contact->phone)
                    ->line('Message: '.$this->contact->message)
                    ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
