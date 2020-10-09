<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
// use App\Models\User;

class AdminMailMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user,$subject,$message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$subject,$message)
    {

        $this->user=$user;
        $this->subject=$subject;
        $this->message=$message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        $email=$this->user->email;
        

           $mailtemplate = Mailtemplate::where([['name','send_message'],['status','active']])->first(); 
               $message= $mailtemplate->mail_content;
                 
                   $message= str_replace(':username',$this->user->name,$message);
                   $message= str_replace(':message',$this->message,$message);

            return $this->markdown('emails.mailcontent')
                    ->subject($this->subject)
                    ->with([
                        'content' => $message,
                        ]);
    }
}
