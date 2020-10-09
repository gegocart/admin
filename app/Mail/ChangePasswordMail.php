<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;

class ChangePasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
      $this->name=$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailtemplate = Mailtemplate::where([['name','change_password'],['status','active']])->first();

        
        $subject =  $mailtemplate->subject;
        $mail_content = $mailtemplate->mail_content;

        $mail_content = str_replace(":name",$this->name,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    

     
    }
}
