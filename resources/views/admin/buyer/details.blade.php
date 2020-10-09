@extends('layouts.admin.layout')
@section('content')
@include('layouts.admin.success')
@include('layouts.admin.error')
 
       	<div class="flex items-center justify-between pt-2 pb-4" >
		<h2 class="text-base text-gray-700 font-semibold">{{trans('details.buyerdetails')}}</h2>
		<!-- <a href="#" class="border custom_border hover:bg-white px-4 py-1 text-xs rounded txt_dark">Back</a> -->
		</div>
		
		<!-- start -->
		   <div class="flex flex-col lg:flex-row md:flex-row py-3">

		   	<div class="w-full ">
		   	<div class="flex items-center justify-between">
		   	<p class="text-sm font-semibold text-gray-700 px-1">{{trans('details.id')}} : {{$user->id}}</p>
		   	<div class="flex justify-end my-2">

          @if($preuser->id!=null)
		    	<a href="{{url('/admin/buyer/'.$preuser->id.'/details')}}" class="rounded-full p-2 arrow_icon border border-transparent">
		   		<img src="{{url('/images/icons_1/left-arrow.svg')}}" class="w-3 h-3"></a>
		  @else
              <a href="#" class="rounded-full p-2 arrow_icon border border-transparent">
		   		<img src="{{url('/images/icons_1/left-arrow.svg')}}" class="w-3 h-3"></a>

		  @endif

		 @if($nextuser->id!="")
		    <a href="{{url('/admin/buyer/'.$nextuser->id.'/details')}}" class="rounded-full p-2 arrow_icon border border-transparent">
		   		<img src="{{url('/images/icons_1/right-arrow.svg')}}" class="w-3 h-3"></a>
		 @else
		    <a href="#" class="rounded-full p-2 arrow_icon border border-transparent">
		   		<img src="{{url('/images/icons_1/right-arrow.svg')}}" class="w-3 h-3"></a>
		 @endif
		   	
		   	</div>
		   	</div>
		   		<div class="bg-white text-sm custom_txt custom_shadow py-3 px-3 rounded">
		   		
		   		<div class="flex flex-col lg:flex-row justify-between pb-5 border-b">
		   		<div class="flex items-center ">
		   			<div class="relative">

		   		@if($user->image!="")
 
		   			<img src="{{url($user->image)}}" class="rounded-full w-20 h-20">
 
		   		@else
		   			<img src="{{url('/profile/default.png')}}" class="rounded-full w-20 h-20">
		   		@endif


		   		

		   			<div class="relative">
		   			<a href="#" class=" p-1 mt-1 rounded-full absolute bottom-0 right-0"><!-- <img src="images/icons_1/camera.svg" class="w-3 h-3"> -->

		          @if($user->login_status==1)
		   			<span class="w-3 h-3 rounded-full inline-block bg_green ml-1"></span>
		   		
		   		  @endif
		   			</a>
		   		<!-- 	<input type="file" name="" class="opacity-0 file_upload"> -->
		   			</div>

		   		

		   		  
		   			</div>
		   			<div class="leading-relaxed  mx-3 lg:mx-5">
		   			<p class="text-lg text-orange font-medium">{{$user->name}}</p>
		   			<p>{{$user->email}}</p>
		   			</div>
		   		</div>
		   		<div class="flex flex-col lg:flex-row">
		   		 

		   			<ul class="list-reset leading-loose px-1 lg:px-5 py-2 lg:py-0">
		   				<li>{{trans('details.firstname')}} : {{$user->defaultAddress->firstname}}</li>
		   				<li>{{trans('details.lastname')}} : {{$user->defaultAddress->lastname}}</li>
		   				<li>{{trans('details.emailverified')}} :
		   					@if($user->email_verified_at!="")
		   						<span class="bg_green rounded px-1 text-xs text-white">{{trans('details.verified')}}</span>
		   					@else
		   						<span class="bg_red rounded px-1 text-xs text-white">{{trans('details.unverified')}}</span>
		   					@endif
		   				 </li>
		   			</ul>
		   			<ul class="list-reset leading-loose px-1 lg:px-5 py-2 lg:py-0">
		   			<li>{{trans('details.country')}} : {{$user->defaultAddress->country->name}}</li>
		   			<li>{{trans('details.mobile')}} : {{$user->defaultAddress->mobileno}}</li>	
		   			</ul>
		   		 

		   		</div>
		   		<div class="w-32">
		   		<div class="flex items-center justify-between relative">
		   		 
					<user-status id="{{$user->id}}">
					</user-status>


		   		<!-- <a href="#" class="bg_blue text-white text-xs px-2 py-1 rounded mx-1">Login us user</a> -->
		   		<a href="#" onclick="show_option('more-option')" class="mx-1 px-2 py-2 rounded-full bg-light border" ><img src="{{url('images/icons_1/more_icon.svg')}}" class="w-3 h-3"></a>
		   		<div id="more-option" class="hidden bg-white shadow rounded px-2 py-1 absolute border custom_border lg:right-0 md:right-0 lg:left-auto md:left-auto left-0 w-48">
		   			<ul class="list-reset text-sm leading-loose">
		   				<li><a href="{{url('/admin/buyer/'.$user->id.'/sendmail')}}">{{trans('details.sendmail')}}</a></li>
		   				<li><a href="#">
		   				
		   				     <verify-code usergroup="{{$user->usergroup_id}}" id="{{$user->id}}">
		   					</verify-code>

		   				</a></li>
		   				<li><a id="reset"  rel="{{url('/admin/buyer/resetpassword')}}">{{trans('details.resetpassword')}}</a></li>
		   				<li><a href="{{url('/admin/buyer/'.$user->id.'/edit')}}">{{trans('details.edituser')}}</a></li>
		   				<!-- <li> 
		   					<delete-buyer  id="{{$user->id}}">
		   					</delete-buyer>
		   				</li> -->
		   			</ul>
		   		</div>
		   		</div>	
		   		</div>
		   	</div>
		   	<div class="pt-3">
		   		<ul class="list-reset text-xs leading-relaxed flex flex-col lg:flex-row lg:items-center">
		   			
		   			 @if($user->last_login_at!=null)
			   			   <li class="pr-3 lg:border-r mr-3">
			   			      {{$user->lasloginat()}}
			   			   </li>
		   			  @endif
		   		
		   			<li class="pr-3 lg:border-r mr-3">Login From : <a href="#">{{$user->lastLoginFrom()}}</a></li>
		   			<li class="pr-3 mr-3">{{trans('details.currentstatus')}}: 
		 
		   			 @if($user->login_status==1)
		             	Online
		             @elseif($user->login_status==0)
		             	Offline
		             @endif
		   			</li>
		   		</ul>
		   	</div>
		   		</div>

 
		   		<div class="bg-white text-xs lg:text-sm custom_txt custom_shadow py-3 px-3 rounded my-4">
                   @include('admin.buyer.tab')
                    	<div class="py-5">
                          @yield('tab')
                        </div>
                 </div>


		</div>
</div>

@endsection
@push('scripts')

<script>
	  $.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
                    });
	 function show_option(id){
 
    if($('#'+id).hasClass('hidden')){
      $('#'+id).removeClass('hidden').addClass('block');
    }
      else
      {
      $('#'+id).removeClass('block').addClass('hidden'); 
    }
  }
   $('#reset').on('click', function(){
          
        var name="{{$user->name}}";
        var link = $(this).attr('rel');
       

     swal({
 
  text: "Do you want to password reset for this user?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
 
    
        $.ajax({
           type:'POST',
           url:link,
           data:{name:name},
           success:function(data){
           // console.log(data);
               if(data.success=='Successfully')
               {
               	 swal("Success", {
                   
                    icon: "success",
                 });

               }
               else
               {
               	  swal("The mail was send, Shall you check mail template status", {
                   
                    icon: "error",
                 });
               }

           }
        });

         


  } else {
    swal("Your action is cancel!");
  }
});


    }); 

</script>
@endpush