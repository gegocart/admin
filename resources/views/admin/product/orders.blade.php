@extends('admin.product.details')
@section('tab')
 
   	<div id="tabcontent3" >
      @foreach ($product->orderitem as  $orderItem)
		   	   <div class="flex border-b pb-5 my-3">
		   	   <div class="w-1/5">
		   	   <div class="flex items-center ">
		   			<div class="relative">
		   	  	@if($orderItem->user->image!="")
		   			<img src="{{url('/profile/'.$orderItem->user->image)}}" class="rounded-full w-16 h-16">
		   		@else
		   			<img src="{{url('/profile/default.png')}}" class="rounded-full w-16 h-16">
		   		@endif
		   		 
		   			<div class="relative">
		   			<a href="#" class=" p-1 mt-1 rounded-full absolute bottom-0 right-0">
		   			<span class="w-3 h-3 rounded-full inline-block bg_green ml-1"></span>
		   			</a>
		   			</div>
		   			</div>
		   			<div class="leading-relaxed  mx-3">
		   			<p class="text-lg text-orange font-medium">{{$orderItem->user->name}}</p>
		   			<p class="text-sm custom_txt">{{$orderItem->user->email}}</p>
		   			</div>
		   		</div>
		   	   
		   	   	</div>

		   	   	<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="py-1">{{trans('product.shippingmethod')}} : {{$orderItem->order->shippingMethod->name}}</li>

		   	   			<li class="py-1">{{trans('product.paymentmethod')}} : {{$orderItem->order->paymentMethod->gateway_name}}</li>

		   	   			<li class="py-1">{{trans('product.quantity')}} : {{$orderItem->quantity}}</li>
		   	   		</ul>
		   	   	</div>
		   	   		<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			
		   	   			<li class="py-1">{{trans('product.orderdate')}} : {{date('d-M-Y',strtotime($orderItem->order->created_at))}}</li>
		   	   			
		   	   			<li class="py-1">{{trans('product.deliverydate')}} :
		   	   				{{$orderItem->status=="shipped" ? date('d-M-Y',strtotime($orderItem->updated_at)):'-'}}  </li>
		   	   			
		   	   			<li class="py-1"> {{trans('product.orderstatus')}} :

		   	   				@if($orderItem->order->status=="completed")
		   	   					<span class="bg_green rounded-full px-1 text-xs text-white mx-1   font-normal">{{$orderItem->order->status}}
		   	   					</span>
		   	   				@elseif($orderItem->order->status=="processing")
                              
                                  <span class="bg_yellow rounded-full px-1 text-xs text-white mx-1 font-normal">{{$orderItem->order->status}}
                                  </span>
		   	   				
                             @else
                                  <span class="  rounded-full px-1 text-xs  mx-1 font-normal">{{$orderItem->order->status}}
                                  </span>

		   	   				@endif


		   	   			</li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   	<div class="w-1/3 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="flex "><span class="w-3/12">{{trans('product.address')}} :</span> <span class="mx-2 w-10/12">
		   	   			{{$orderItem->order->address->address_1}}</span></li>

		   	   			<li class="flex pt-2"><span class="w-3/12">{{trans('product.amount')}} :</span><span class="mx-2 w-10/12 text-gray-900 text-base font-semibold">
		   	   			{{$product->formattedPrice}}</span></li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   </div>

		   @endforeach
		   	</div>
 @endsection