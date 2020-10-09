<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Traits\OrderProcess;
use App\Traits\TransactionProcess;


class CreateTransaction
{
    use OrderProcess,TransactionProcess;
    /**
     * Handle the event.
     *
     * @param  OrderPaid  $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {  
        $event->order->transactions()->create([
             'user_id'=>$event->order->user_id,
              //'total' => $event->order->total()->amount()
             //'total' => $event->order->totalvalue(),
        ]);
        $this->createOrderTxn($event->order,$event->data,$event->product);

    }
}
