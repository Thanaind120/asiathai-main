<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class MemberMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Password confirmation email')
        ->from('noreply@poolvilla.com','Poolvilla') 
        ->to($this->data['email'])
        ->markdown('email.MemberMail')->with([
            'id' => $this->data['id'],
            'email' => $this->data['email'],
            'email_verified_at' => $this->data['email_verified_at'],
            'password' => $this->data['password'],
            'remember_token' => $this->data['remember_token'],
            'first_name' => $this->data['first_name'],
            'last_name' => $this->data['last_name'],
            'phone' => $this->data['phone'],
            'status' => $this->data['status'],
            'created_at' => $this->data['created_at'],
            'updated_at' => $this->data['updated_at'],
            'session_lang' => $this->data['session_lang'],
       ]);
  
    }
    
}
