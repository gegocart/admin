<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\Category;
use Illuminate\Database\Query\Builder;
use App\Http\Requests\Category\SubcategoryRequest;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\EditSubcategoryRequest;
use Exception;

class SubCategoryController extends Controller
{
    public function displaysubcategory(Request $request,$id)
    {
        $show=(int)$request->show;
        $subcategory;
          if($show!=0){
           $subcategory=Category::with('attributesetcategory')->whereNotNull('parent_id')
            ->where('parent_id',$id)->paginate($show);
         }
         else{
           $subcategory=Category::with('attributesetcategory')->whereNotNull('parent_id')
            ->where('parent_id',$id)->paginate(10);
         }
        return SubCategoryResource::collection(
            $subcategory
        );
    }
     

    public function searchsubcategory(Request $request,$parentid)
    {
       //$q = Input::get('name');
       $q = $request->name;
     
       $ressubcategory=Category::with('attributesetcategory')->whereNotNull('parent_id')
                                               ->where('parent_id',$parentid);
 
 
     if($q != "" || $q!=null)
     {
       
       $subcategory = $ressubcategory->where(function ($query) use($q) {
         $query->orwhere('name', 'LIKE', '%' . $q . '%' )
         ->orWhere('slug', 'LIKE', '%' . $q . '%' );
       })->paginate (10)->setPath ( '' );

       
       
       $pagination = $subcategory->appends ( array (
         'name' => $q
       ));

        if (count ( $subcategory ) > 0)
        {
          return SubCategoryResource::collection(
           $subcategory
         );
        }
     }
     else
     {
        return SubCategoryResource::collection(
           $ressubcategory->paginate(10)
        );
     }
        
       //return rescategory;
    }

    
    public function store(SubcategoryRequest $request)
    {
     
    	 $res=[];

       try
       {
	        $category=new Category();
	        $category->name=$request->name;
	        $category->slug=$request->slug;
	        $category->parent_id=$request->parent_id;
	        $category->order=1;
	      //  $category=$request->parent_id;
	        $category->save();
         
            return response()->json(['success'=>true,'message'=>'Saved Successfully'],200);
       }
       catch(Exception $e)
       {
          // $res['message']=$e->getMessage();
          // if (str_contains($e->getMessage(),"Integrity constraint violation: 1062 Duplicate entry"))
          // {
          //   $res['message']="Duplicate Entry";
          // }
          // return $res;
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }


    }


    public function edit($id)
    {
    	$category=Category::where('id',$id)->first();
          
         return new SubCategoryResource(
               $category
            );

    }


    public function update(EditSubcategoryRequest $request, $id)
    {
      
    	 $res=[];   
       try
       {
          if (Category::where('name', $request->name)
                       ->where('parent_id',$request->parent_id)->where('id','!=',$id)->first())
          {
            return response()->json(['success'=>false,'message'=>'Name Already Exists.'],200);
                 
          }
	        $category=Category::find($id);
	        $category->name=$request->name;
	       // $category->slug=$request->slug;
	        $category->parent_id=$request->parent_id;
	        $category->order=1;
	      //  $category=$request->parent_id;
	        $category->save();
          
          return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);

       }
       catch(Exception $e)
       {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
          //  $res['message']=$e->getMessage();
          // if (str_contains($e->getMessage(),"Integrity constraint violation: 1062 Duplicate entry"))
          // {
          //   $res['message']="Duplicate Entry";
          // }
          // return $res;
       }


    }

    public function destroy($id)
    {
    	$res=[];
        try {
              $category=Category::where('id',$id)->delete();
              $res['message']='Deleted Successfully';
              //return $res;
              return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
            } 
        catch (Exception $e) 
        {
            // $res['message']=$e->getMessage();
            // return $res;
           return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }        

    }
}
