@extends('layouts.admin.layout')
@section('content')
<div class="">
  

        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('setting.settingadd')}}</h2>
        <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
      
        <div class="">
    <form method="post">
        @csrf
   <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('setting.key')}}</span>
                    </label>
                       <input name="key"  value="{{ old('key') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('key')}}</p> 
                 </div>

 </div>
 <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('setting.name')}}</span>
                    </label>
                       <input name="name"  value="{{ old('name') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('name')}}</p> 
                 </div>

 </div>
  <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('setting.description')}}</span>
                    </label>
                       <textarea name="description" class="form-control w-full py-2 px-2 border text-sm" >{{ old('description') }} 
                       </textarea>
                        <p class="text-xs text-red-600"> {{$errors->first('description')}}</p> 
                 </div>

 </div>
   <div class="py-4">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                 
                    <span class="text-sm">{{trans('setting.value')}}</span>
                    </label>
                       <input name="value"  value="{{ old('value') }}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('value')}}</p> 
                 </div>

 </div>
 
 <div class="py-4 px-4">
                    <label class="form-group block block custom-label">
                    <span class="text-sm">{{trans('setting.status')}}</span>
                    <div class="flex my-2">
                    <input class="self-center m-2" type="radio" name="status" value="1"  checked>
                    <h4>{{trans('setting.active')}}</h4>
                    <input class="self-center mx-2" type="radio" name="status" value="0"  >
                    <h4>{{trans('setting.inactive')}}</h4>
                    </div>
                    </label>
 </div>
 


  
 <div class="pt-3 px-4">
                    <button class="  bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('adduser.submit')}}</button>
                 
 </div>

    </form>
   </div>
</div>
</div>

</div>

@endsection