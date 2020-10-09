<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributeset;
use App\Http\Resources\Seller\AttributesetResource;
use App\Http\Requests\Seller\EditAttributesetRequest;
use App\Http\Requests\Seller\AttributesetRequest;
use Exception;

class AttributesetController extends Controller
{

    public function getattributeset()
    {
      $attributeset=Attributeset::get();
      
      return $attributeset;

    }

     public function displayattributeset(Request $request)
    {
      $show=(int)$request->show;
      if($show!=0){
         $attributeset=Attributeset::paginate($show);
      }
      else{
        $attributeset=Attributeset::paginate(10);
      }
      
      return $attributeset;

    }

    
    public function searchattributeset(Request $request)
    {


       
       $q = $request->name;

       
     
       //$resattributeset=Attributeset::get();
 
 
     if($q != "" || $q!=null)
     {
       
       $attributeset = Attributeset::where(function ($query) use($q) {
         $query->orwhere('name', 'LIKE', '%' . $q . '%' )->orwhere('status', 'LIKE',$q );
         })->paginate (10)->setPath ( '' );
        
       

        if (count ( $attributeset ) > 0)
        {
           return $attributeset;
          
        }
     }
     else
     {
        $resattributeset=Attributeset::paginate(10);
        return $resattributeset;
     }
       
    }


     public function store(AttributesetRequest $request)
    {
      
        $res=[];
             
       try
       {

          $attributeset=new Attributeset();
          $attributeset->name=$request->name;
          $attributeset->status=$request->status;
          $attributeset->save();

           $res['message']="Saved Successfully";
          return $res;
        
            // return new AttributesetResource(
            //    $attributeset
            // );

       }
       catch(Exception $e)
       {
           $res['message']=$e->getMessage();
        

        if(str_contains($e->getMessage(),'Integrity constraint violation: 1062 Duplicate entry'))
          {
            $res['message']='Duplicate entry';
          }

            return $res;
       }


    }


    public function edit($id)
    {
      $attributeset=Attributeset::where('id',$id)->first();
          
         return new AttributesetResource(
               $attributeset
            );

    }


    public function update(EditAttributesetRequest $request, $id)
    {
       // dd($request->status);
      $res=[];   
       try
       {
          $attributeset=Attributeset::find($id);
          $attributeset->name=$request->name;
          $attributeset->status=$request->status;
          $attributeset->save();
        
            // return new AttributesetResource(
            //    $attributeset
            // );
          $res['message']="Updated Successfully";
          return $res;
       }
       catch(Exception $e)
       {
          $res['message']=$e->getMessage();
        

        if(str_contains($e->getMessage(),'Integrity constraint violation: 1062 Duplicate entry'))
          {
            $res['message']='Duplicate entry';
          }

            return $res;
       }


    }

    public function destroy($id)
    {
      $res=[];
        try {
              $attributeset=Attributeset::where('id',$id)->delete();
              $res['message']='Deleted Successfully';
               return response()->json(['success'=>true,'message'=>'Deleted Successfully'],200);
            } 
        catch (Exception $e) 
        {

            $res['message']=$e->getMessage();
        

            return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
           
        }        

    }


}
