<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      
      return [
       'id' => $this->id,
        'orderno'=>$this->orderno,
        'status' => $this->status,
        'created_at' => date('d-M-Y', strtotime($this->created_at)),
        'subtotal' => $this->subtotal->formatted(),
        'total' => $this->totalvalue(),   
        'totalPricevalue'=>$this->totalPriceAmount(),
        'payment_method_id'=>$this->payment_method_id,
        'user_id'=>$this->user_id,
        // 'email'=>$this->user->email,
       ];
    }
}
