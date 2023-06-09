<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bookingmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Confirm Payment')->from('noreply@poolvilla.com','Poolvilla')->to($this->data['email'])->markdown('email.booking-email')->with([
            'code' => $this->data['code'],'fullname' => $this->data['fullname'],'phone' => $this->data['phone'],'poolvilla_name' => $this->data['poolvilla_name'],
            'check_in' => $this->data['check_in'],'check_out' => $this->data['check_out'],'total' => $this->data['total'],

    ]);
    }
}
