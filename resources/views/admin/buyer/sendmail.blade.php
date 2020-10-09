@extends('layouts.admin.layout')
@section('content')
<div class="">
   
    <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('sendmail.sendmail')}}</h2>
           <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
        <div class="">
    <form method="post">
        @csrf
    <div class="py-4">

                <div class="  flex flex-col px-4">
  
                    <label class="form-group block my-1 custom-label">
                    
                    <span class="text-sm">{{trans('sendmail.subject')}} </span>
                    </label>
                    <input name="subject" type="text" value="{{old('subject')}}" class="form-control w-full py-2 px-2 border text-sm"> 
                    <p class="text-xs text-red-600"> {{$errors->first('subject')}}</p> 
                 </div>
 </div>
 <div class="py-4">
      <div class="  flex flex-col px-4">
   
                    <label class="form-group block my-1 custom-label">
                    
                    <span class="text-sm">{{trans('sendmail.message')}} </span>
                    </label>
                    <textarea name="message" class="form-control w-full py-2 px-2 border text-sm">{{old('message')}}</textarea>
         <p class="text-xs text-red-600"> {{$errors->first('message')}}</p> 
                 </div>
 </div>
 <div class="pt-3">
                    <button class="focus:outline-none bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('sendmail.submit')}} </button>
                </div>

    </form>
   </div>
   </div>
   </div>
 

</div>

@endsection