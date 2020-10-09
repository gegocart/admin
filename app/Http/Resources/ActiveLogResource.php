<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActiveLogResource extends JsonResource
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
            'logname'=>$this->log_name,
            'description'=>$this->description,
            'properties'=>$this->properties['ip'],
            'created_at'=>date('d-M-Y',strtotime($this->created_at)),
            'dateandtime'=>date('d-M-Y H:i',strtotime($this->created_at)),

        ];
    }
}
