<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;
use App\Models\Address;

class SellerOrderMail extends Mailable implements ShouldQueue
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
        $template = Mailtemplate::where([['name','seller_new_order'],['status','active']])->first();
       
        $address = Address::where([['user_id',$this->user->id],['default','1']])->first();
      
        $subject =  $template->subject;
        $mail_content = $template->mail_content;
       
        $mail_content = str_replace(":name",$this->user->name,$mail_content);
        $mail_content = str_replace(":address1",$address->address_1,$mail_content);
        $mail_content = str_replace(":address2",$address->address_2,$mail_content);
       // $mail_content = str_replace(":address",$this->user->name,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
