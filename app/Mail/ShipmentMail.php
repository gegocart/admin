<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Mailtemplate;
use App\Models\User;
use App\Models\Order;

class ShipmentMail extends Mailable implements ShouldQueue
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
        $user = Mailtemplate::where([['name','order_shipment'],['status','active']])->first();
       
      $order = Order::where('user_id',$this->user->id)->first();
        $subject =  $user->subject;
        $mail_content = $user->mail_content;

        $mail_content = str_replace(":name",$this->user->name,$mail_content);
       $mail_content = str_replace(":orderno",$order->orderno,$mail_content);
       // $mail_content = str_replace(":address",$this->user->name,$mail_content);

        return $this->markdown('emails.mailcontent')
                    ->subject($subject)
                    ->with([
                        'content' => $mail_content,
                        ]);
    }
}
