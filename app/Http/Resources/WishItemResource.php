<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon; 
use App\Models\RatingReview;



class WishItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $myDate=$this->created_at->format('d-m-Y');
        $reviewtotal=RatingReview::where('entity_id',$this->product->id)->sum('rating');
        $reviewcount=RatingReview::where('entity_id',$this->product->id)->count();
        $averagecount=0;
        if($reviewtotal!=0 && $reviewcount!=0){
            $averagecount=round(($reviewtotal/$reviewcount),0);
          }
           

      //  dd($this->product);
         
        return [
                    'id'=>$this->id,
                    'date'=>$myDate,
                    'wishlist_id'=>$this->wishlist_id,
                    'product_id'=>$this->product_id,
                     //'product'=>ProductWishListResource::collection($this->product),
                     //'store_id'=>$this->product->store_id,
                    'name'=>$this->product->name,
                    'slug'=>$this->product->slug,
                    //'sku'=>$this->product->sku,
                    'description'=>$this->product->description,
                    'product_image'=>$this->product->product_image,
                    // 'thumbnailimage'=>$this->product->thumbnailimage,
                    'price'=>$this->product->formattedPrice,
                    //'tax_id'=>$this->product->tax_id,
                    'status'=>$this->product->status,
                    'rate'=>$averagecount,
                    'productgallery'=>$this->product->productgallery,


        ];
    }
}
