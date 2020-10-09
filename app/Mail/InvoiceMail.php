<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\Mailtemplate;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $user,$mailinvoice;

    public function __construct($user,$mailinvoice)
    {
        $this->user=$user;
        $this->mailinvoice=$mailinvoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $user = Mailtemplate::where([['name','invoice'],['status','active']])->first();
        $subject =  $user->subject;
        $mail_content = $user->mail_content;

        $mail_content = str_replace(":name",$this->user->name,$mail_content);
        $mail_content = str_replace(":invoice",$this->mailinvoice->invoiceno,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
