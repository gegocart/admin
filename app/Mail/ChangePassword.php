<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mailtemplate;

class ChangePassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $kycverified = Mailtemplate::where([['name','change_password'],
                                        ['status','active']])->first();
        $subject =  $kycverified->subject;
        $mail_content = $kycverified->mail_content;
        $password=bcrypt($this->user->password);
        $mail_content = str_replace(":name",$this->user->name,$mail_content);
      //  $mail_content = str_replace(":password",$password,$mail_content);
       
        
        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }

    
}
