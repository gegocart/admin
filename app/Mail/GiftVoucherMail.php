<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mailtemplate;
use App\Models\User;

class GiftVoucherMail extends Mailable implements ShouldQueue
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
        //
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $user = Mailtemplate::where([['name','giftvoucher_status'],['status','active']])->first();


      

        $subject =  $user->subject;
        $mail_content = $user->mail_content;
        
        $mail_content = str_replace(":name",$this->user->name,$mail_content);
        $mail_content = str_replace(":message",'thank you',$mail_content);
       //$mail_content = str_replace(":address",$this->user->name,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
