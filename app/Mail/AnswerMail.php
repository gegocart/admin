<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;
use App\Models\Product;

class AnswerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user,$answer,$product;

    public function __construct($user,$answer,$product)
    {
        $this->user=$user;
        $this->answer=$answer;
        $this->product=$product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = Mailtemplate::where([['name','answer_mail'],['status','active']])->first();
       $product=Product::where('id',$this->product->product_id)->first();
     
        $subject =  $mail->subject;
        $mail_content = $mail->mail_content;

        $mail_content = str_replace(":name",$this->user,$mail_content);
       $mail_content = str_replace(":productname",$product->name,$mail_content);
       $mail_content = str_replace(":question",$this->product->question,$mail_content);
       $mail_content = str_replace(":answer",$this->answer,$mail_content);
//dd($mailcontent);
        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
