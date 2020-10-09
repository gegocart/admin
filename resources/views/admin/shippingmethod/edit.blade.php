@extends('layouts.admin.layout')
@section('content')
<div class="">
  

        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('shippingmethod.editshippingmethod')}}</h2>
        <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
      
        <div class="">
    <form method="post">
        @csrf
   <div class="py-4">
                
                <div class="w-full lg:w-1/4 flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('shippingmethod.name')}}</span>
                    </label>
                       <input name="name"  value="{{ old('name',optional($shippingmethod)->name) }}" 
                       type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('name')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="w-full lg:w-1/4 flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('shippingmethod.price')}}</span>
                    </label>
                       <input name="price"  value="{{ old('price',optional($shippingmethod)->formattedPrice) }}" 
                       type="number" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('price')}}</p> 
                 </div>

 </div>
 <!-- <div class="py-4">
                
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

 </div> -->
 <div class="pt-3 px-4">
                    <button class="focus:outline-none bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('shippingmethod.submit')}}</button>
                 
 </div>

    </form>
   </div>
</div>
</div>

</div>

@endsection