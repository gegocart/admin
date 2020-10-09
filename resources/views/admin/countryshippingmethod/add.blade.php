@extends('layouts.admin.layout')
@section('content')

<div class="">
  

        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('shippingmethod.addcountryshipping')}}</h2>
        <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
      
        <div class="">
    <form method="post">
        @csrf
   <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('shippingmethod.shippingname')}}</span>
                    </label>
                      <select  class="form-control" name="shippingname">
                        <option value="">Select</option>
                            @foreach($shippingmethods as $shippingmethod)
                           {{$shippingmethod->id}}
                                <option value="{{$shippingmethod->id}}" 
                                    {{ ($getshippingmethod->id==$shippingmethod->id?"selected":"") }}>
                                    {{$shippingmethod->name}}
                                </option>
                            
                            @endforeach
                           
                        </select> 
                        <p class="text-xs text-red-600"> {{$errors->first('shippingname')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('shippingmethod.countryname')}}</span>
                    </label>
                       <select  class="form-control" name="countryname">
                        <option value="">Select</option>
                            @foreach($countries as $country)
                           
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            
                            @endforeach
                           
                        </select>
                        <p class="text-xs text-red-600"> {{$errors->first('countryname')}}</p> 
                 </div>

 </div>
 
  <div class="pt-3 px-4">
                    <button class="  bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('shippingmethod.submit')}}</button>
                 
 </div>

    </form>
   </div>
</div>
</div>

</div>

@endsection