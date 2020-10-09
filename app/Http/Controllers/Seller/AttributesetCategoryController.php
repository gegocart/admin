<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributeset;
use App\Models\Category;
use App\Models\AttributesetCategory;
use Exception;
use App\Http\Requests\Seller\AttributesetcategoryRequest;
use App\Http\Requests\Seller\EditAttributesetcategoryRequest;

class AttributesetCategoryController extends Controller
{

  public function searchattributesetcategory(Request $request)
  {
   
    $search=$request->name;
   // dd($search);
   $attributeset=AttributesetCategory::with('attributeset_category',
          'category_attributeset');
 
    if($search!="" || $search!=null)
    {

     $attributeset=$attributeset->where(function($query)use ($search){
        $query->orwhereHas('attributeset_category',function($q) use ($search){
            $q->Where('name','LIKE',$search.'%');
            })->orwhereHas('category_attributeset',function($q) use ($search){
            $q->Where('name','LIKE',$search.'%');
            });
         });
  
    }


   return $attributeset->paginate(10);


  }
    
     public function displayattributesetcategory(Request $request)
     {
        $show=(int)$request->show;

        if($show!=0){

       	 $attributeset=AttributesetCategory::with('attributeset_category',
          'category_attributeset')->paginate($show);
                                                                               
            
        }
        else{
           $attributeset=AttributesetCategory::with('attributeset_category',
            'category_attributeset')->paginate(15);
                                                                                    
        }

        return $attributeset;
     }

     public function getattributesetcategory(Request $request)
     {
        $show=(int)$request->show;

        if($show!=0){

         $attributeset=AttributesetCategory::with('attributeset_category',
          'category_attributeset')->get();//paginate($show);
                                                                               
            
        }
        else{
           $attributeset=AttributesetCategory::with('attributeset_category',
            'category_attributeset')->get(); //paginate(15);
                                                                                    
        }

        return $attributeset;
     }

      
    public function store(AttributesetcategoryRequest $request)
    {

       $res=[];
             
       try
       {
        //dd($request);
          $attributesetcategory=new AttributesetCategory();
          $attributesetcategory->attributeset_id=$request->attributeset_id;
          $attributesetcategory->category_id=$request->categoryid;
          $attributesetcategory->save();
           
          return response()->json(['success'=>true,'message'=>'Saved Successfully'],200);

       }
       catch(Exception $e)
       {
         return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       	  //   $res['message']=$e->getMessage();
        

          // if(str_contains($e->getMessage(),'Integrity constraint violation: 1062 Duplicate entry'))
          //   {
          //     $res['message']='Duplicate entry';
          //   }

          //   return $res;
       }


    }

    public function edit($id)
    {
      $attributesetcategory=AttributesetCategory::where('id',$id)->first();
          
       return $attributesetcategory;

    }


    public function update(EditAttributesetcategoryRequest $request, $id)
    {
      // dd($id);
             
       try
       {
          $attributesetcategory=AttributesetCategory::find($id);
          $attributesetcategory->attributeset_id=$request->attributeset_id;
          $attributesetcategory->category_id=$request->category_id;
          $attributesetcategory->save();

          return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
          // return $attributesetcategory;
           
       }
       catch(Exception $e)
       {
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }


    }

    public function destroy($id)
    {
      $res=[];
        try {
              $attributesetcategory=AttributesetCategory::where('id',$id)->delete();
               return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
            } 
        catch (Exception $e) 
        {

            return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }        

    }


}
