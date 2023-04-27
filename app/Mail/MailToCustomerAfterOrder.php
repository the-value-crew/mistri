<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToCustomerAfterOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user_type , $user , $order;

    public function __construct($user_type,$user,$order)
    {
        $this->user_type = $user_type;
        $this->user = $user;
        $this->order= $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.mail_to_customer_after_order')->subject('Order Placed Successfully');
    }
}
