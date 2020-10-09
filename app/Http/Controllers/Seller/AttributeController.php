<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributeset;
use App\Models\Attribute;
use App\Http\Requests\seller\AttributeRequest;
use App\Http\Requests\seller\EditAttributeRequest;
use Exception;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
 
    
class AttributeController extends Controller
{  use Common,LogActivity;
    

    public function searchattributes(Request $request)
  {
   
    $search=$request->name;

    // dd($search);
  
    $attributes=Attribute::with('attributesetrelation');


 
    if($search!="")
    {

      $attributes=$attributes->orwhere('attribute_code','LIKE',$search.'%')->orwhere('attribute_label','LIKE',$search.'%')->orwhere('input_type','LIKE',$search.'%')->orwhere('input_value','LIKE','%'.$search.'%');
         
  
    }

   //  $productQuestion=$productQuestion->get();
   // // dd($productQuestion);
    $attributes=$attributes->paginate(15);
    return $attributes;


  }


    public function diplayattributes(Request $request)
    {
      $show=(int)$request->show;
      
      if($show!=0){
         $attributes=Attribute::with('attributesetrelation')->paginate($show);
      }
      else{
        $attributes=Attribute::with('attributesetrelation')->paginate(15);
        
      }
    	
    	return $attributes;
    }


    
    public function store(AttributeRequest $request)
    {
         
       $res=[];


       try
       {
         
          $attribute=new Attribute();
          $attribute->attributeset_id=$request->attributeset_id;
          $attribute->attribute_code=$request->attribute_code;
          $attribute->attribute_label=$request->attribute_label;
          $attribute->input_type=$request->input_type;
          $attribute->input_value=$request->input_value;
          $attribute->required=$request->required;
          $attribute->visible=$request->visible;
          $attribute->searchable=$request->searchable;
          $attribute->filterable=$request->filterable;
          $attribute->comparable=$request->comparable;
          $attribute->variation=$request->variation;
          $attribute->validation=$request->validation;
          $attribute->save();

        
        
          $res['message']="Saved Successfully";

                   try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $attribute,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_ATTRIBUTES_STORED',
          'Attributes Stored'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
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

     public function edit($id)
    {
        $attribute=Attribute::where('id',$id)->first();
          
         return $attribute;

    }


    public function update(EditAttributeRequest $request, $id)
    {
       //dd($id);
      $res=[];
       try
       {
        
          $attribute=Attribute::find($id);
          $attribute->attributeset_id=$request->attributeset_id;
          $attribute->attribute_code=$request->attribute_code;
          $attribute->attribute_label=$request->attribute_label;
          $attribute->input_type=$request->input_type;
          $attribute->input_value=$request->input_value;
          $attribute->required=$request->required;
          $attribute->visible=$request->visible;
          $attribute->searchable=$request->searchable;
          $attribute->filterable=$request->filterable;
          $attribute->comparable=$request->comparable;
          $attribute->variation=$request->variation;
          $attribute->validation=$request->validation;
          $attribute->save();
          
          $res['message']="Updated Successfully";

   try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $attribute,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_ATTRIBUTES_STORED',
          'Attributes Stored'
        );

     }
    catch(Exception $e)
    {
      //dd($e->getMessage());
    }
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
              $attribute=Attribute::where('id',$id)->delete();
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
