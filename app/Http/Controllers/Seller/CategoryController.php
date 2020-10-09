<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Query\Builder;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use Exception;
use Illuminate\Support\Facades\Input; 
use Illuminate\Support\Facades\Auth;
//use App\Http\Resources\Admin\CategoryResource;

class CategoryController extends Controller
{

	  public function displaycategory(Request $request)
    {
        $show=(int)$request->show;
        
         $category;
         if($show!=0){
           $category=Category::whereNull('parent_id')->paginate($show);
         }
         else{
           $category=Category::whereNull('parent_id')->paginate(10);
         }
        return CategoryResource::collection(
            $category
        );
    }

    public function searchcategory(Request $request)
    {
      //$q = Input::get('name');
       $q = $request->name;

     // dd((double)$q);
       $rescategory=Category::whereNull('parent_id');
 
 
     if($q != "" || $q!=null)
     {
       
       $category = $rescategory->where(function ($query) use($q) {
         $query->orwhere('name', 'LIKE', '%' . $q . '%' )
         ->orWhere('slug', 'LIKE', '%' . $q . '%' )
          ->orWhere('commission_fee', 'LIKE',$q.'.00');
       })->paginate (10)->setPath ( '' );

       
       
       $pagination = $category->appends ( array (
         'name' => $q
       ));

        if (count ( $category ) > 0)
        {
          return CategoryResource::collection(
           $category
         );
        }
     }
     else
     {
        return CategoryResource::collection(
            //Category::whereNull('parent_id')->paginate(2)
             $rescategory->paginate(10)
        );
     }
        
       //return rescategory;
    }
   
   
    public function getsubcategorycount($id)
    {
       $subcategorycount=Category::with('children')->where('parent_id','=',$id)->count();
       return $subcategorycount;
    }
    
    public function store(CategoryRequest $request)
    {

    	   //$res=[];      
       try
       {
	        $category=new Category();
	        $category->name=$request->name;
	        $category->slug=$request->slug;
          $category->order=1;
	        $category->commission_fee=$request->commissionfee;
	      //  $category=$request->parent_id;
	        $category->save();
          //$res['message']="Saved Successfully";
          //return $res;
          return response()->json(['success'=>true,'message'=>'Saved Successfully'],200);
            // return new CategoryResource(
            //    $category
            // );

       }
       catch(Exception $e)
       {
        //   $res['message']=$e->getMessage();
        

        // if(str_contains($e->getMessage(),'Integrity constraint violation: 1062 Duplicate entry'))
        //   {
        //     $res['message']='Category Name and Slug must be unique';
        //   }
        return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
            //return $res;
       }


    }


    public function edit($id)
    {
      $category;
      if($id!=undefined){
        $category=Category::where('id',$id)->first();
      if(is_null($category))
       {
          return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
       }
      }
    	
             
         return new CategoryResource(
               $category
            );

    }


    public function update(EditCategoryRequest $request, $id)
    {
       //$res=[];
    	       
       try
       {
          if (Category::whereNull('parent_id')->where('name', $request->name)->where('id','!=',$id)->first())
          {
            return response()->json(['success'=>false,'message'=>'Name Already Exists.'],200);
                 
          }
	        $category=Category::find($id);
           if(is_null($category))
           {
            return response()->json(['error'=>422,'message'=>'Unprocessable Entity'],422);
           }
	        $category->name=$request->name;
	        //$category->slug=$request->slug;
          $category->order=1;
	        $category->commission_fee=$request->commission_fee;
	      //  $category=$request->parent_id;
	        $category->save();
           return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
         // $res['message']="Updated Successfully";
          //return $res;
            // return new CategoryResource(
            //    $category
            // );

       }
       catch(Exception $e)
       {
        
         return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);

       }


    }

    public function destroy($id)
    {
    	//$res=[];
        try {
              $category=Category::where('id',$id)->delete();
              //$res['message']='Deleted Successfully';
               return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
            } 
        catch (Exception $e) 
        {
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }        

    }


}
