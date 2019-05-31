<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailableProduct extends Mailable
{
    use Queueable, SerializesModels;
    public $usname;
    public $cartid;
    public $bdt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usname,$cartid,$bdt)
    {
        $this->usname =$usname;
        $this->cartid =$cartid;
        $this->bdt =$bdt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('productmail');
    }
}
