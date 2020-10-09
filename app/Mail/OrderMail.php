<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;
use App\Models\Address;

class OrderMail extends Mailable implements ShouldQueue
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
        $user = Mailtemplate::where([['name','new_order'],['status','active']])->first();


        //$address = Address::where('user_id',$this->user->id)->first();

       
        $address = Address::where([['user_id',$this->user->id],['default','1']])->first();


        $subject =  $user->subject;
        $mail_content = $user->mail_content;
        
        $mail_content = str_replace(":name",$this->user->name,$mail_content);
        $mail_content = str_replace(":order",$address->address_1,$mail_content);
       //$mail_content = str_replace(":address",$this->user->name,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
