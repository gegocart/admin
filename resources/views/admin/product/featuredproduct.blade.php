@extends('layouts.admin.layout')
@section('content')
	
<div class="">
<h2 class="text-base text-gray-700 font-semibold py-2">Add As Featured</h2>
     <div class=" bg-white  rounded px-2 py-4 my-3">
     <div class="mx-5">
      
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
                    <span class="text-sm"><strong>{{$product->name}}</strong></span>
                    </label>
                    <input type="hidden"  value="{{$product->slug}}" name="slug" class="form-control w-full py-2 px-2 border text-sm"> 
     </div>
 </div>
 <div class="py-4">
  <div class="  flex flex-col px-4">
      
                    <label class="form-group block my-1 custom-label">  
                    <span class="text-sm">Start Date</span>
                    </label>
                     <input type="date"  id="datepicker" name="startdate" class="form-control w-full 
                     py-2 px-2 border text-sm"> 
                   
     </div>
     <small class="text-red-500 text-sm mb-1 mt-1">{{ $errors->first('doj') }}</small>
 </div>
 <div class="py-4">
  <div class="  flex flex-col px-4">
      
                    <label class="form-group block my-1 custom-label">  
                    <span class="text-sm">End Date</span>
                    </label>
                   <input type="date"  id="datepicker2" name="enddate" class="form-control w-full py-2 px-2 border text-sm"> 
     </div>
 </div>
 
 
 
 <div class="pt-3">
                    <button class="bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">submit</button>
                </div>

    </form>
   </div>
  </div>
 </div>
</div>

 @endsection
 @push('push')
 <script>
  $( "#datepicker" ).datepicker({
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});
</script>
<script>
  $( "#datepicker2" ).datepicker({
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});
</script>
        
        @endpush