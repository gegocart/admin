<?php

namespace App\Http\Controllers\Admin\ShippingMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use App\Models\Country;
use App\Models\CountryShippingMethod;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\CountryShippingResource;

class CountryShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

       $search=$request->search;
       $countryshippingmethods=CountryShippingMethod::with('country','shippingmethod')
                               ->paginate($paginate);
 
       
     // if($search!="")
     // { 
     //    $countryshippingmethods=CountryShippingMethod::with('country','shippingmethod')
     //        ->where(function($query) use ($search){
     //        $query->Where('name','LIKE',$search.'%');
     //        })->paginate($paginate); 
                 
     // }
     $countryshippingmethods=$countryshippingmethods->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
  
        return view('admin.countryshippingmethod.list',[
            'countryshippingmethods'=> $countryshippingmethods
             
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         $countries=Country::where('status','active')->get();
         $getshippingmethod=ShippingMethod::find($id);
         $shippingmethods=ShippingMethod::get();
         return view('admin.countryshippingmethod.add',
             ['countries'=>$countries,
              'getshippingmethod'=>$getshippingmethod,
              'shippingmethods'=>$shippingmethods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        $shippingmethod=ShippingMethod::find($id);
        $shippingmethod->countries()->attach($request->countryname); 

        $countryshippingmethods=CountryShippingMethod::with('country','shippingmethod')->get();

         return view('admin.countryshippingmethod.list',
             ['countries'=>$countries,
              'shippingmethods'=>$shippingmethods,
              'countryshippingmethods'=>$countryshippingmethods]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingmethod=ShippingMethod::where('id',$id)->first();
       return view('admin.shippingmethod.edit',[
         'shippingmethod'=>$shippingmethod,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $shippingmethod=ShippingMethod::where('id',$id)->first();
        $shippingmethod->name=$request->name;
        $shippingmethod->price=$request->price;
        $shippingmethod->save();

        return redirect('/admin/shippingmethod')->with(['success'=>'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ShippingMethod::where('id',$id)->delete();

         return redirect('/admin/shippingmethod')->with(['success'=>'ShippingMethod deleted successfully.']);
    }
}
