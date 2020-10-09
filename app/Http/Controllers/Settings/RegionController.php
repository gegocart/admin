<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\City;
use App\Models\Region;
use App\Models\State;
use App\Models\Country;
use App\Models\PincodeRegion;
use File;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\Imports\PincodeRegionImport;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Setting\PincodeRequest;
use App\Http\Requests\Setting\EditPincodeRegionRequest;
use Illuminate\Support\Str;
use App\Http\Resources\RegionResource;
use App\Http\Requests\Orders\EditPincode;

// use App\Http\Resources\RegionResource;

class RegionController extends Controller
{
    

    public function searchregionlist(Request $request)
  {
   
    $search=$request->name;
      $show=$request->show==0?10:(int)$request->show;

    

   $region=Region::with('pincoderegions','countries')->where('seller_id',Auth::id());
 
    if($search!="")
    {

      $region=$region->where(function($query)use ($search){
        $query->orWhere('regionname','LIKE',$search.'%')
        ->orWhere('status','LIKE',$search)
          ->orwhereHas('countries',function($q) use ($search){
            $q->Where('name','LIKE',$search.'%');
            });
         });
  
    }

    $region=$region->paginate($show);

   
     return RegionResource::collection(
               $region
            );


  }

   public function getRegionNamelist(Request $request)
    {
      
       $show=$request->show==0?10:(int)$request->show;

       $region=Region::with('pincoderegions','countries')
       ->where('seller_id',Auth::id())->paginate($show); 
        
        return RegionResource::collection(
               $region
            );
    }


     public function index()
    {
    	$region=Region::with('countries')->paginate(15);
    	return $region;
    }

    
     public function store(PincodeRequest $request) //
    {
       $res=[];

       try
       {
          $filename=$request->file('import_file')->getClientOriginalName();
         // //dump($filename);
         // if (Region::where('import_file_name', $filename)->exists()) {
         //     return response()->json(['success'=>false,'message'=>'File name already exists'],422);
         //  }

         
       
           $city_arr= explode(",",$request->city_id);
           $state_arr= explode(",",$request->state_id);
  \DB::beginTransaction();
      
          $region=new Region;
          $region->country_id=$request->country_id;
          $region->regionname=$request->regionname;
          $region->seller_id=Auth::id();
          $region->state_id=$state_arr;
          $region->city_id=$city_arr;
          $region->status=$request->status;
          $region->delivered=$request->delivered;
          $region->import_file_name=$filename;
          $region->save();


          
            $ext = $request->file('import_file')->getClientOriginalExtension();
            $path = $request->file('import_file')->getRealPath();

          try
          {
            Excel::import(new PincodeRegionImport($region), request()->file('import_file'));
          }
          catch(\Maatwebsite\Excel\Validators\ValidationException $e)
          {
            \DB::rollBack();
            $failures = $e->failures();
            $array =[];
            $arrvalue=[];
            foreach ($failures as $failure) {
         
             $failure->row(); // row that went wrong
             $failure->attribute(); // either heading key (if using heading row concern) or column index
             $failure->errors(); // Actual error messages from Laravel validator
            $failure->values(); // The values of the row that has failed.
            
            $array = array_flatten($failure->errors());
             $arrvalue=array_flatten($failure->values());
            return response()->json(['success'=>false,'duplicate'=>$array,
              'value'=>$arrvalue],422);
           }
            
          }
            \DB::commit();
          return response()->json(['success'=>true,'message'=>'Saved Successfully'],200);
       }
       catch(Exception $e)
       {
          \DB::rollBack();
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
       }

    }


   

    public function getPincodelist(Request $request,$regionid)
    {

      $show=$request->show==null?15:(int)$request->show;
     
       $pincoderegion=PincodeRegion::where('region_id',$regionid)->paginate($show);

      if($request->search)
      {
          $pincoderegion=PincodeRegion::where('region_id',$regionid)->where('pincode',$request->search)->paginate($show);
      }
      else
      {
         $pincoderegion=PincodeRegion::where('region_id',$regionid)->paginate($show);
      }

       return $pincoderegion;
    }

    public function getStateCitylist($regionid)
    {
      // $stateid=Region::where('id',$regionid)->pluck('state_id');
     
      // $statelist=State::whereIn('id',$stateid)->paginate(10);
      // return $statelist;
      $region=Region::with('pincoderegions','countries')
       ->where('seller_id',Auth::id())->where('id',$regionid)->paginate(10); 
        
        return RegionResource::collection(
               $region
            );
    }

    // public function getCitylist($regionid)
    // {
    //   $region=Region::with('pincoderegions','countries')
    //    ->where('seller_id',Auth::id())->where('id',$regionid)->paginate(10); 
        
    //     return RegionResource::collection(
    //            $region
    //         );
    // }


    
    public function edit($id)
    {
    	$res=[];
        $region=Region::where('id',$id)->first();
        $states=State::where('country_id',$region->country_id)->get();

        $res['region']=$region;
        $res['states']=$states;
        return $res;
    }

    public function update(EditPincodeRegionRequest $request,$id)
    {
        $res=[];
        try
        {
           $filename='';
          $city_arr= explode(",",$request->city_id);
           $state_arr= explode(",",$request->state_id); 
             \DB::beginTransaction();

           if($request->hasFile('import_file'))
            {
             $filename=$request->file('import_file')->getClientOriginalName();
             }  

              $region=Region::find($id);
	         // $region->country_id=$request->country_id;
	          $region->regionname=$request->regionname;
	          $region->seller_id=Auth::id();
	          $region->state_id=$state_arr;
	          $region->city_id=$city_arr;
	          $region->status=$request->status;
	          $region->delivered=$request->delivered;
            $region->import_file_name=$region->import_file_name .',' + $filename;
	         $region->save();

            if($request->hasFile('import_file'))
            {
	           $filename=$request->file('import_file')->getClientOriginalName();
	          
	            $ext = $request->file('import_file')->getClientOriginalExtension();
	            $path = $request->file('import_file')->getRealPath();
	           
	               try
                  {
                    Excel::import(new PincodeRegionImport($region), request()->file('import_file'));
                  }
                  catch(\Maatwebsite\Excel\Validators\ValidationException $e)
                  {
                    \DB::rollBack();
                    $failures = $e->failures();
                    $array =[];
                    $arrvalue=[];
                    foreach ($failures as $failure) {
                 
                     $failure->row(); // row that went wrong
                     $failure->attribute(); // either heading key (if using heading row concern) or column index
                     $failure->errors(); // Actual error messages from Laravel validator
                    $failure->values(); // The values of the row that has failed.
                    
                    $array = array_flatten($failure->errors());
                     $arrvalue=array_flatten($failure->values());
                    return response()->json(['success'=>false,'duplicate'=>$array,
                      'value'=>$arrvalue],422);
                   }
                    
                  }
	            
          }

          $res['message']='Updated Successfully';
           \DB::commit();
          //return $res;
          return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
                  
        }
        catch(Exception $e)
        {
          \DB::rollBack();
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
        }
      
    }

    public function updatePincode(EditPincode $request)
    {
       $pincoderegion=PincodeRegion::where('id',$request->id)->first();
       $pincoderegion->pincode=$request->modifiedPincode;
       $pincoderegion->save();

      return response()->json(['success'=>true,'message'=>'Updated Successfully'],200);
    }

    public function destroy($id)
    {
        $res=[];
        try {
          $pincoderegion=PincodeRegion::where('region_id',$id)->delete();

              $region=Region::where('id',$id)->delete();
               $res['message']='Deleted Successfully';
              return $res;
            } 
        catch (Exception $e) 
        {

            $res['message']=$e->getMessage();


          if(str_contains($e->getMessage(),'Cannot delete or update a parent row: a foreign key constraint'))
            {
              $res['message']='Cannot delete the row';
            }
            return $res;
        }   
    }

     public function pincodecheck($seller_id,$pincode)
    {
      
        $res=[];
        try
        {
         
          // $prefix=substr($pin_code, 0, 3);
          $region=Region::where('seller_id',$seller_id)->first();
          $pincode=PincodeRegion::with('region')->where('pincode',$pincode)->get();
          return $pincode;
        }
        catch(Exception $e)
        {
           $res['message']=$e->getMessage();
           return $res; 
        }
       
    }

}
