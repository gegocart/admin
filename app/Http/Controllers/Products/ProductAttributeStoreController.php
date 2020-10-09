<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductSource;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Exception;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Traits\Common;
use App\Traits\AttributeProductStoreEdit;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogActivity;
use App\Models\Category;
use App\Http\Resources\ProductEditResource;
use App\Models\AttributesetCategory;
use App\Models\Attribute;

class ProductAttributeStoreController extends Controller
{
	  use Common,LogActivity,AttributeProductStoreEdit;

    public function store(ProductRequest $request)
    {
        \DB::beginTransaction();

            
          $res=[];
          try
          {
            
             $input = $request->all();            
              // dd($input);
          $attributesetcategorys =AttributesetCategory::where('category_id',$request->category_id)->first();

              $attributesetid=$attributesetcategorys->attributeset_id;

           $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();

          
             if(count($attribute)==0)
             {
               
               $res['message']="Attach Subcategory with attributeset and add Attributes for selected Category"; 
                
             }
             else
             {
                          
               $product=new Product;
               $product->user_id=Auth::id();
               $product->store_id=$request->store_id;
               $product->name=$request->name;
               $product->brand=$request->brandname;
               $product->slug=$request->slug;
               $product->price=$request->price * 100;
               $product->weight=$request->weight;
               $product->sku=$request->sku;
               $product->description=$request->description;
               $product->tax_id=$request->tax_id;
               $product->status=$request->status;

               $product->type=$request->type;

               $product->save();

              for($i=0;$i<$request->imagecount;$i++)
              {
                 $imagepath = $this->uploadFile('uploads/images'
                  ,$request->file(['product_image'.$i]));

               $name = $request->file(['product_image'.$i])->getClientOriginalName();
              
                  $resizeimage_path=$this->getFilePath($imagepath);

                  $img = Image::make($resizeimage_path);
                  $img->resize(40,40);
                
                  $img->save('uploads/images/thumbnail/'.$name);
                
                  $thumbnailimage='uploads/images/thumbnail/'.$name;
                 
                $productgallery=new ProductGallery();
                 $productgallery->product_id=$product->id;
                 $productgallery->position=1;
                 $productgallery->imagepath=$imagepath;
                 $productgallery->attribute_id=$attribute->id; //passed default
                 $productgallery->thumbnailimage=$thumbnailimage;
                 $productgallery->save();
             }
             //

               $productsource=new ProductSource();
               $file=$request->file('productsource');
               if($file!=null)
               {
                 $sourcepath = $this->uploadFile('uploads/source',$file);
                 $productsource->product_id=$product->id;
                 $productsource->slug=$product->slug;
                 $productsource->source=$sourcepath;
               
                 $productsource->save();
               }
               
               $category=Category::find($request->category_id);
               $product->categories()->attach($category);

               
                $this->attribute_productstore($request->category_id,$product,$request->price);     
             }
             \DB::commit();

                  try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $product,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_PRODUCT_STORED',
          'Product Stored'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
         return response()->json(['success'=>true,'message'=>'Product Saved Successfully',
                  'productid'=>$product->id],200);
           
          }
          catch(Exception $e)
           {
            \DB::rollBack();
           // dump($e->getMessage());
              return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
               // return $res;
           }
    }

    public function edit($id)
    {
       $product=Product::with('categories','stores')->where('id',$id)->first();

        if(is_null($product))
       {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         
       }
       elseif(auth()->user()->id!=$product->user_id){
          return response()->json(['success'=>false,'message'=>'Forbidden'],403);
       }
     
       return new ProductEditResource(
            $product
        );

    }


    public function update(EditProductRequest $request, $id)
    {
      // dd($request);

      $res=[];
     
       try
       {
          $attributesetcategorys =AttributesetCategory::where('category_id',$request->category_id)->first();

          $attributesetid=$attributesetcategorys->attributeset_id;

          $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();

           $product=Product::find($id);
              
           if(is_null($product))
           {
                return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
           }
           elseif(auth()->user()->id!=$product->user_id){
              return response()->json(['success'=>false,'message'=>'Forbidden'],403);
            
           }
           else
           {
           // dump('gjfdgdhj');
           $product->name=$request->name;
           $product->brand=$request->brandname;
          //  $product->slug=$request->slug;
           $product->description=$request->description;
           $product->price=$request->price;
           $product->weight=$request->weight;
           $product->sku=$request->sku;
           $product->tax_id=$request->tax_id;
           $product->status=$request->status;
           $product->type=$request->type;
           $product->save();
           if($request->imagecount>0)
           {
           
              for($i=0;$i<$request->imagecount;$i++)
              {
                $imagepath = $this->uploadFile('uploads/images'
                  ,$request->file(['product_image'.$i]));

               $name = $request->file(['product_image'.$i])->getClientOriginalName();
              
           
                 
                  $resizeimage_path=$this->getFilePath($imagepath);

                  $img = Image::make($resizeimage_path);
                  $img->resize(40,40);
                
                  $img->save('uploads/images/thumbnail/'.$name);
                
                  $thumbnailimage='uploads/images/thumbnail/'.$name;

                 $productgallery=new ProductGallery();
                 $productgallery->product_id=$product->id;
                 $productgallery->position=1;
                 $productgallery->imagepath=$imagepath;
                 $productgallery->attribute_id=$attribute->id; //passed default
                 $productgallery->thumbnailimage=$thumbnailimage;
                 $productgallery->save();
             }
            }

             $category=Category::find($request->category_id);
               $product->categories()->sync($category,true);
                
             $this->attribute_productupdate($request->category_id,$product);

           
   try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $product,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_PRODUCT_UPDATED',
          'Product Updated'
        );

     }
    catch(Exception $e)
          {
             
          }
             return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);

           }
      }
       catch(Exception $e)
       {
          $res['message']=$e->getMessage();
          return response()->json(['success'=>false,'message'=>$e->getMessage()],422);
          //return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }

    }
}
