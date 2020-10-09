<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;

class AddBuyerMail extends Mailable implements ShouldQueue
{  
    public $password,$email,$name;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$password)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
      $mailtemplate = Mailtemplate::where([['name','admin_register_new_user'],['status','active']])->first();
 
        $subject =  $mailtemplate->subject;
        $mail_content = $mailtemplate->mail_content;
 
        $mail_content = str_replace(":name",$this->name,$mail_content);
        $mail_content = str_replace(":password",$this->password,$mail_content);
        $mail_content = str_replace(":email",$this->email,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    
       

    }
     
}
