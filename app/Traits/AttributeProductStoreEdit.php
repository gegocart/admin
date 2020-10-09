<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\CategoryProduct;
use App\Models\AttributeProduct;
use App\Models\Stock;
use App\Models\AttributesetCategory;
use App\Models\Attribute;
use Exception;

trait AttributeProductStoreEdit
{

    public function attribute_productstore($categoryid,$product)
    {
    	try
    	{
    	   $attributesetcategory=AttributesetCategory::where('category_id',$categoryid)->first();
                  
               
        $attributesetid=$attributesetcategory->attributeset_id;

             $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();
          
           if($attribute->attribute_code==="no variation")
           {

              $attributesetcategory=AttributesetCategory::where('category_id','=',$categoryid)->first();

                 $attributesetid=$attributesetcategory->attributeset_id;

                  $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();
	                 $attributeProduct=new AttributeProduct();
	                 $attributeProduct->product_id=$product->id;
	                 $attributeProduct->attribute_id=$attribute->id;
	                 if($attribute->input_value!=null){
	                  $attributeProduct->attribute_value=$attribute->input_value;
	                 }
	                 else{
	                  $attributeProduct->attribute_value="";
	                 }                        
	                 $attributeProduct->save();
               
               }
               else{
                 $attributesetcategory=AttributesetCategory::where('category_id','=',$categoryid)->first();

                 $attributesetid=$attributesetcategory->attributeset_id;

                  $attribute=Attribute::where('attributeset_id','=',$attributesetid)->get();
              
                  foreach ($attribute as $key => $value) {
                  
                    //if($value->input_value!=null)
                    //{
                     for ($i=0;$i<count($value->input_value);$i++) { 
                             $attributeProduct=new AttributeProduct();
                             $attributeProduct->product_id=$product->id;
                             $attributeProduct->attribute_id=$value->id;
                             $attributeProduct->attribute_value=$value->input_value[$i];
                             $attributeProduct->save();
                        } 
                    //}
                    // else{
                    //   $attributeProduct=new AttributeProduct();
                    //    $attributeProduct->product_id=$product->id;
                    //    $attributeProduct->attribute_id=$value->id;
                    //    //dump($value->input_value);
                    //    if($value->input_value==null){

                    //       $attributeProduct->attribute_value='';
                    //    }
                    //     else{
                    //       $attributeProduct->attribute_value=$value->input_value;
                    //     }
                    //    $attributeProduct->save();
                    // }
                  }
                    // if($request->type=='downloadable')
                    // {
                    //           $productvariant=new ProductVariation();
                    //           $productvariant->product_id=$product->id;
                    //           $productvariant->attribute_product_id=4;
                    //           $productvariant->order=1;
                    //           $productvariant->price=$request->price;
                    //           $productvariant->name="no Variation";
                    //           $productvariant->save();
                    //         }
                  
               }

           }
           catch(Exception $e)
           {    //dump($e->getMessage());
              throw new Exception($e->getMessage());
           }
    }

    public function attribute_productupdate($categoryid,$product)
    {
    	
    	try
    	{
    	 
         // dump($categoryid);
          $attributesetcategory=AttributesetCategory::where('category_id','=',$categoryid)->first();
          //dump($attributesetcategory);
           $attributesetid=$attributesetcategory->attributeset_id;

           $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();
           
          // dd($attribute);
       
          // if($attribute->attribute_code==="no variation")
           // {
           //     $attributeProduct=new AttributeProduct();
           //     $attributeProduct->product_id=$product->id;
           //     $attributeProduct->attribute_id=$attribute->id;
           //     $attributeProduct->attribute_value=$attribute->attribute_code;
           //     $attributeProduct->save();

           //      $productvariation=new ProductVariation();
           //      $productvariation->product_id=$product->id;
               
           //      $productvariation->name=$attribute->attribute_code;

           //      if($attribute->attribute_code==="no variation"){
           //        $productvariation->price=$request->price * 100;  
           //      }
           //      else{
           //        $productvariation->price=$request->price * 100;  
           //      }
                
           //      $productvariation->order=1;
           //      $productvariation->attribute_id=$attribute->id;
           //      $productvariation->save();

           //     //stock table
           //      $stock=new Stock();
           //      $stock->quantity=20;
           //      $stock->product_variation_id=$productvariation->id;
           //      $stock->save();
           //     }
           //     else{
           //       $attributesetcategory=AttributesetCategory::where('category_id','=',$request->category_id)->first();

           //       $attributesetid=$attributesetcategory->attributeset_id;

           //        $attribute=Attribute::where('attributeset_id','=',$attributesetid)->get();
                
           //        foreach ($attribute as $key => $value) {
                   
           //           for ($i=0;$i<count($value->input_value);$i++) { 
           //                   $attributeProduct=new AttributeProduct();
           //                   $attributeProduct->product_id=$product->id;
           //                   $attributeProduct->attribute_id=$value->id;
           //                   $attributeProduct->attribute_value=$value->input_value[$i];
           //                   $attributeProduct->save();
           //              } 
                   
           //        }
                  
           //     }
                

          
            // $categoryproduct=CategoryProduct::find($id);
            // $category=Category::find($request->category_id);
            // $product->categories()->attach($category);
           /* $res['productid']=$product->id;
           $res['message']="Updated Successfully";

           return $res;*/

           }
           catch(Exception $e)
           {    
              throw new Exception($e->getMessage());
           }
    }
}