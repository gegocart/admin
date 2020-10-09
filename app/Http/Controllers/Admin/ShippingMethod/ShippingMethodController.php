<?php

namespace App\Http\Controllers\Admin\ShippingMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\CountryShippingMethod;
use App\Models\Country;

class ShippingMethodController extends Controller
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
       $shippingmethods=ShippingMethod::with('countries')->orderby('id',$orderby)->paginate($paginate);
 

     if($search!="")
     { 
        $shippingmethods=ShippingMethod::where(function($query) use ($search){
            $query->Where('name','LIKE',$search.'%');
            })->orderby('id',$orderby)->paginate($paginate); 
                 
     }

  $shippingmethods=$shippingmethods->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
        return view('admin.shippingmethod.list',[
            'shippingmethods'=>$shippingmethods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::where('status','active')->get();
        return view('admin.shippingmethod.add',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shippingmethod=new ShippingMethod;
        $shippingmethod->name=$request->name;
        $shippingmethod->price=$request->price;
        $shippingmethod->save();

        $shippingmethod->countries()->attach($request->countryname); //countryrefers
          
        return redirect('/admin/shippingmethod')->with(['success'=>trans('success.shippingmethodadded')]);
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
      $countries=Country::where('status','active')->get();
       return view('admin.shippingmethod.edit',[
         'shippingmethod'=>$shippingmethod,
         'countries'=>$countries
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

        $shippingmethod->countries()->attach($request->countryname); //countryid

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
        $countryShippingMethod=CountryShippingMethod::where('shipping_method_id',$id)->first();
        if($countryShippingMethod==null)
        {
            $shippingMethod=ShippingMethod::where('id',$id)->delete();    
            return redirect()->back()->with(['success'=>'delete successfully']);
        }
        
        return redirect()->back()->with(['error'=>'Does not delete']);
        

    }

    // public function attachcountryshippingmethod(Request $request,$id)
    // {
    //     // $shippingmethod=ShippingMethod::find($id);
    //     // $shippingmethod->countries()->attach($request->countryname); 

    //     //return redirect('/admin/shippingmethod')->with(['success'=>'Attached Successfully.']);
    //      $countryshippingmethods=CountryShippingMethod::with('country','shippingmethod')->get();
    //                            dump($countryshippingmethods);
    //      return redirect('admin.countryshippingmethod.list',[
    //         'countryshippingmethods'=> $countryshippingmethods
             
    //     ]);

    // }

}
