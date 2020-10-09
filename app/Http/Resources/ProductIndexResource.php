<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductGalleryResource;
use App\Http\Resources\Product_VariationsResource;
use App\Http\Resources\RatingReviewResource;
use App\Http\Resources\VariationResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductQuestionResource;
use App\Http\Resources\ProductAnswerResource;
use App\Models\RatingReview;
use Illuminate\Support\Str;

class ProductIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
  
        $reviewtotal=$this->ratereviewtotal();

        $reviewcount=$this->ratereviewcount();
        $averagecount=0;
        if($reviewtotal!=0 && $reviewcount!=0){
          $averagecount=round(($reviewtotal/$reviewcount),0);
        }
       
        return [
            'id' => $this->id,
            'user_id'=>$this->user_id,
            'user_name'=>$this->users->name,
            'store_id'=>$this->store_id,
            'user'=>$this->users,
            'name' => $this->name,
            'brand'=>$this->brand,
            'slug' => $this->slug,
            'description' => $this->description,
            'productprice'=>$this->product_price,
            'price' => $this->formattedPrice,
            'weight' => $this->weight,
            'tax_id'=>$this->tax_id,
            'sku'=>$this->sku,
            'type'=>$this->type,
            'ratings'=>$this->ratings,
            'status'=>$this->status,
            'approved_by'=>$this->approved_by,
            'rateproduct1'=>$this->rateperproduct1(),
            'rateproduct2'=>$this->rateperproduct2(),
            'rateproduct3'=>$this->rateperproduct3(),
            'rateproduct4'=>$this->rateperproduct4(),
            'rateproduct5'=>$this->rateperproduct5(),
            'rate'=>$averagecount,
            'ratetotal'=>$reviewtotal,
            'reviewcount'=>$reviewcount,
            'productgallery' => ProductGalleryResource::collection($this->productgallery),
            'stock_count' => $this->stockCount(),
            'store_name'=>$this->stores->name,
            'in_stock' => $this->inStock(),
            'category'=>CategoryResource::collection($this->categories),
           // 'variations'=>VariationResource::collection($this->variations)
          
          'productvariations'=>Product_VariationsResource::collection($this->variations),
        
          'question'=>ProductQuestionResource::collection($this->productquestion),
              'answer'=>ProductAnswerResource::collection($this->productanswer),
               'slicename'=>Str::limit($this->name, 50, ' ...'),
       ];
    }
}
