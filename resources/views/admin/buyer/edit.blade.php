@extends('layouts.admin.layout')
@section('content')
@include('admin.buyer.success')
<div class="">
      <div class="flex justify-between">
        <h2 class="text-base text-gray-700 font-semibold py-2">{{trans('edituser.buyeredit')}}</h2>
        <a class="self-center text-sm text-orange font-semibold" href="{{url('/admin/buyer/'.$user->id.'/addresses')}}">Addresses</a>
      </div>
     		
     	   <div class="bg-white  rounded px-2 py-4 my-3">
            <div class="mx-5">
     	<div class="">
	<form method="post" enctype="multipart/form-data">
		@csrf
    <div class="flex flex-col lg:flex-row md:flex-row items-center">
  <div class="w-full lg:w-1/2 md:w-1/2 py-3">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.username')}}</span>
                    </label>
                      <input name="name" type="text" value="{{old('name',optional($user)->name)}}" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('name')}}</p> 
                 </div>

 </div>



   <div class="w-full lg:w-1/2 md:w-1/2 py-3">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.email')}}</span>
                    </label>
                      <input name="email" value="{{old('email',optional($user)->email)}}" type="text" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600"> {{$errors->first('email')}}</p> 
                 </div>

 </div>
 </div>
    <div class="flex flex-col lg:flex-row md:flex-row items-center">
 <div class="w-full lg:w-1/2 md:w-1/2 py-3 flex">
                
                <div class="  flex flex-col px-4 w-10/12">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.selectprofile')}}</span>
                    </label>
                      <input  id="imgInp" name="image" value="{{old('image')}}"  type="file" class="form-control w-full py-2 px-2 border text-sm"> 
                        <p class="text-xs text-red-600">{{$errors->first('selectprofile')}}</p> 
                 </div>
 
              <div>
              
              
          @if($user->image!="")
         <img id="blah" class="rounded-full w-20 h-20" src="{{url($user->image)}}" alt="your image" />
           
          @else
          
         <img id="blah" class="rounded-full w-20 h-20" src="{{url('/profile/default.png')}}" alt="your image" />
             
          @endif    
          
         <!-- <img id="blah" class="rounded-full w-20 h-20" src="{{url($user->image)}}" alt="your image" /> -->
     </div>

 </div>

 <input type="hidden" name="userid" value="{{$user->id}}">

<!-- <div class="w-full lg:w-1/2 md:w-1/2 py-3">
                
                <div class="  flex flex-col px-4">
                    <label class="form-group block my-1 custom-label">
                  
                    <span class="text-sm">{{trans('edituser.usergroup')}}</span>
                    </label>
                   <select class="form-control w-full py-2 px-2 border text-sm" name="usergroup_id">

                    @foreach($usergroups as $usergroup)
                       <option value="{{$usergroup->id}}" {{old('usergroup_id',optional($user)->usergroup_id)=="$usergroup->id"? 'selected':''}}>{{$usergroup->name}} </option>
                    @endforeach
                   </select>
                   <p class="text-xs text-red-600"> {{$errors->first('usergroup_id')}}</p> 
                 </div>

</div> -->

</div>
 
  <div class="pt-3 px-4 flex items-center">
                    <button class="focus:outline-none bg_orange text-white text-sm px-8 py-2 rounded-full custom_shadow login_btn">{{trans('edituser.submit')}}</button>
                     <div class=""><a href=" " class="mx-2 text-black text-sm px-8 py-2 rounded-full custom_shadow   bg-gray-300 hover:bg-gray-400">{{trans('edituser.reset')}}</a></div>

 </div>


    </form>
   </div>
 </div>
 </div>

</div>

@endsection
@push('scripts')
<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

</script> 
@endpush