@extends('layouts.admin.layout')
@section('content')
<div class="">
<h2 class="text-base text-gray-700 font-semibold py-2">{{trans('templateedit.editmaittemplate')}}</h2>
     <div class=" bg-white  rounded px-2 py-4 my-3">
     <div class="lg:mx-3 md:mx-3">
      
        <div class="">
    <form method="post">
        @csrf
 <!-- <div class="py-4">
    {{$mailtamplate->name}}
                    <label class="form-group block relative">
                    <input name="name" value="{{old('name',optional($mailtamplate)->name)}}" type="text"  class="form-control w-full"> 
                    <span class="text-xs mx-2">Name</span>
                    </label>
 </div> -->
 <div class="py-4">
  <div class="  flex flex-col px-4">
      
                    <label class="form-group block my-1 custom-label">  
                    <span class="text-sm">{{trans('templateedit.subject')}}</span>
                    </label>
                    <input name="subject" type="text" value="{{old('subject',optional($mailtamplate)->subject)}}" class="form-control w-full py-2 px-2 border text-sm"> 
                       <p class="text-xs text-red-600"> {{$errors->first('subject')}}</p> 
     </div>
 </div>
 <div class="py-4">
 <div class="  flex flex-col px-4">
  
                    <label  class="form-group block my-1 custom-label">
                    <span class="text-sm ">{{trans('templateedit.mailcontent')}}</span>
                    </label>
                    <textarea  name="mail_content" id="mail_content"  class="form-control w-full">{{old('mail_content',optional($mailtamplate)->mail_content)}}</textarea>

     <p class="text-xs text-red-600"> {{$errors->first('mail_content')}}</p> 
     </div>                
 </div>
 <div class="py-4 px-4">
                    <label class="form-group block block custom-label">
                    <span class="text-sm">{{trans('templateedit.status')}}</span>
                    <div class="flex my-2">
                    <input class="self-center m-2" type="radio" name="status" value="active" @if($mailtamplate->status=="active")checked
                    @endif >
                    <h4>{{trans('templateedit.active')}}</h4>
                    <input class="self-center mx-2" type="radio" name="status" value="inactive" @if($mailtamplate->status=="inactive")checked
                    @endif>
                    <h4>{{trans('templateedit.inactive')}}</h4>
                    </div>
                    </label>
 </div>
 
 <div class="pt-3">
                    <button class="focus:outline-none bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('templateedit.save')}}</button>
                </div>

    </form>
   </div>
  </div>
 </div>
</div>

@endsection
  
    @push('scripts')

<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
    <script type="text/javascript">
         CKEDITOR.replace( 'mail_content',
         {
          customConfig : 'config.js',
         
          })
</script> 
@endpush