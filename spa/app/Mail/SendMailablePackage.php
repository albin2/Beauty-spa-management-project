<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailablePackage extends Mailable
{
    use Queueable, SerializesModels;
    public $usname;
    public $bdates;
    public $times;
    public $packname;
    
    public $employee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bdates,$times,$packname,$usname,$employee)
    {
        $this->usname = $usname;
        $this->bdates =$bdates;
        $this->times =$times;
        $this->packname =$packname;
        $this->employee =$employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('packmail');
    }
}
