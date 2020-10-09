<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;
use App\Models\Order;

class QuestionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user,$question,$productname;

    public function __construct($user,$question,$productname)
    {
        $this->user=$user;
        $this->question=$question;
        $this->productname=$productname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = Mailtemplate::where([['name','question_mail'],['status','active']])->first();
   // dd($this->question);

      //$order = Order::where('user_id',$this->user->id)->first();
        $subject =  $mail->subject;
        $mail_content = $mail->mail_content;

        $mail_content = str_replace(":name",$this->user,$mail_content);

       $mail_content = str_replace(":productname",$this->productname,$mail_content);
              $mail_content = str_replace(":question",$this->question,$mail_content);
//dd($mail_content);
        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
