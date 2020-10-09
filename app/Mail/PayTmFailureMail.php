<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mailtemplate; 

class PayTmFailureMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
     public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $username=$this->username;
          
           $mailtemplate = Mailtemplate::where([['name','paytm_failure'],['status','active']])->first();

                  $subject =  $mailtemplate->subject;
          $mail_content = $mailtemplate->mail_content;              

                $mail_content= str_replace(':name',$username,$mail_content);

          return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]); 
                 
    }
    
}
