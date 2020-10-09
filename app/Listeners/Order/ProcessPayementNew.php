<?php

namespace App\Listeners\Order;

use App\Cart\Cart;
use App\Events\Order\OrderCreated;
use App\Events\Order\OrderPaid;
use App\Events\Order\OrderPaymentFailed;
use App\Exceptions\PaymentFailedException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class ProcessPayementNew implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
         $order = $event->order;
         $data = $event->data;
         $product = $event->product;
        
         try {
            
            event(new OrderPaid($order,$data,$product));
        } catch (PaymentFailedException $e) {
            event(new OrderPaymentFailed($order));
        }
    }
}
