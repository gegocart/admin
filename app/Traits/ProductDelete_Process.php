<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\CategoryProduct;
use App\Models\AttributeProduct;
use App\Models\Stock;
use Exception;
use App\Models\ProductVariationOrder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\RatingReview;
use App\Models\WishList;
use App\Models\WishListItem;
use App\Models\Transaction;


trait ProductDelete_Process
{


  public function deleteProduct($productid)
  {
        try
         {
          
           Product::whereIn('id',$productid)->delete();
              
         }
         catch(Exception $e)
         {
          throw new Exception($e->getMessage());
         }
     }

	public function deleteProductGallery($productid)
	{
		try
         {
           
             $galleryid=ProductGallery::whereIn('product_id',$productid)->pluck('id')->toArray();
             ProductGallery::whereIn('id',$galleryid)->delete();

         }
         catch(Exception $e)
         {
         	throw new Exception($e->getMessage());
         }
     }

     // public function deleteProductVariationOrder($productid)

     // { 
     //    try
     //     {

     //       $variationid=ProductVariation::whereIn('product_id',$productid)->pluck('id')->toArray();

     //      if(ProductVariationOrder::whereIn('product_variation_id',$variationid)->count() > 0)
     //      {

     //         $orderid=ProductVariationOrder::whereIn('product_variation_id',$variationid)
     //                                              ->pluck('order_id')->toArray();

     //         Order::whereIn('id',$orderid)->delete();

     //         OrderItem::whereIn('order_id',$orderid)->delete();
           
     //         Transaction::whereIn('order_id',$orderid)->delete();

     //         ProductVariationOrder::whereIn('product_variation_id',$product_variation_id)->delete();


     //      }
           

     //      }
     //     catch(Exception $e)
     //     {
     //      throw new Exception($e->getMessage());
     //     }

     // }
     

     public function deleteProductVariation($productid)
     {
     	try
     	{

          $variationid=ProductVariation::whereIn('product_id',$productid)->pluck('id')->toArray();
         
          $stockid=Stock::whereIn('product_variation_id',$variationid)->pluck('id')->toArray();
          Stock::whereIn('id',$stockid)->delete();
          ProductVariation::whereIn('id',$variationid)->delete();
     	}
     	catch(Exception $e)
     	{
     		
           throw new Exception($e->getMessage());
     	}
     }

     public function deleteAttributeProduct($productid)
     {
     	try
     	{

          $attributeid=AttributeProduct::whereIn('product_id',$productid)->pluck('id')->toArray();
          AttributeProduct::whereIn('id',$attributeid)->delete();
         
     	}
     	catch(Exception $e)
     	{
     	  throw new Exception($e->getMessage());
     	}
     }

     public function deleteCategoryProduct($productid)
     {
     	try
     	{

           $categoryproductid=CategoryProduct::whereIn('product_id',$productid)->pluck('id')->toArray();
           CategoryProduct::whereIn('id',$categoryproductid)->delete();
     	}
     	catch(Exception $e)
     	{
     	  throw new Exception($e->getMessage());
     	}
     }

     public function deleteReviewRating($productid)
     {
        try
        {
           if(RatingReview::whereIn('entity_id',$productid)->count() > 0)
           {
             RatingReview::whereIn('entity_id',$productid)->delete();
           }
           
        }
        catch(Exception $e)
        {
          throw new Exception($e->getMessage());
        }
     }

     public function deleteWishList($productid)
     {
        try
        {
          
           if(WishListItem::whereIn('product_id',$productid)->count() > 0)
           {
               $wishlistid=WishListItem::whereIn('product_id',$productid)
                                     ->pluck('wishlist_id')->toArray();

               WishListItem::whereIn('product_id',$productid)->delete();

               WishList::whereIn('id',$wishlistid)->delete();
           }
                                   
         }
        catch(Exception $e)
        {
          throw new Exception($e->getMessage());
        }
     }

}