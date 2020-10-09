
@extends('layouts.admin.layout')
@section('content')
	
		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-lg text-gray-700 font-semibold">Product Detail</h2>
	
		</div>
		<!-- start -->
		<div class="flex flex-col lg:flex-row">
		<div class="w-fll lg:w-3/5 my-2 lg:my-5 lg:pr-3 h-auto">
			<div class="content_sec px-4 py-4 bg-white rounded">
				<img src="images/product.png" class="w-full h-auto rounded">
			</div>
		</div>
		<div class="w-full lg:w-2/5 my-2 lg:my-5 lg:pl-3 h-auto">
			<div class="content_sec px-3 py-3 bg-white rounded h-full">
				<div>
				<h2 class="text-base text-gray-700 font-semibold">{{$product->name}}</h2>
				<div class="flex items-center  my-3 ">
			    <h2 class="text-xl text-gray-900 font-semibold">{{$product->price}}</h2>
			    <span class="text-sm line-through txt_red mx-3">{{$product->price}}</span>
			    </div>
				<div class="my-3">
					<ul class="list-reset flex items-center">
                            		<li class="mr-1"><img src="{{url('images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="{{url('images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="{{url('images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="{{url('images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="{{url('images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                            	</ul>
				</div>
					<p class="text-sm leading-loose text-gray-700 my-3">
						{{$product->description}}
					</p>
					<div class="my-2">
						<ul class="list-reset text-sm text-gray-700">
							<li class="font-semibold py-2">
								@if($product->status=='approve')
							<p class="font-semibold">Status : <span class="bg_green rounded-full px-2 py-1 text-xs text-white mx-1 font-normal">Active</span></p></li>
							@endif
							@if($product->status=='cancel')
							<p class="font-semibold">Status : <span class="bg_red rounded-full px-2 py-1 text-xs text-white mx-1 font-normal">InActive</span></p></li>
							@endif
							<li class="font-semibold py-2"><p>Store : <span class="text-sm  mx-1 font-normal text-gray-900">Accessories shop</span></p></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		</div>
		<!-- end -->
		<!-- start -->
		<div class="content_sec px-3 py-3 bg-white rounded">
			<div class="custom_tab">
		  		<ul class="list-reset flex flex-wrap items-center border-b text-sm custom_txt">
		  		<li id="tab1" class="px-3 py-2 mr-3 lg:mr-5 tab active" onclick="custom_tab('tab1','tabcontent1')">Description</li>
		  		
		  		<li id="tab2" class="px-3 py-2 mr-3 lg:mr-5 tab" onclick="custom_tab('tab2','tabcontent2')">Reviews (2)</li>
		  		<li id="tab3" class="px-3 py-2 mr-3 lg:mr-5 tab" onclick="custom_tab('tab3','tabcontent3')">Orders</li>
		  		</ul>
		  		</div>
		  <div class="py-5 custom_tab_content">
		  	<div id="tabcontent1" class="box active">
                <p class="text-sm leading-loose text-gray-700 ">
					{{$product->description}}
				</p>
		  	</div>
		  	<div id="tabcontent2" class="box">
		  	<div class="flex flex-col lg:flex-row my-2">
		  		<div class="w-full lg:w-1/12 ">
		  		<img src="images/1.jpg" class="rounded-full w-12 h-12 mx-auto">
		  		<p class="text-xs text-gray-800 text-center">Buyer1</p>
		  		</div>
		  		<div class="mx-3 my-1 w-full lg:w-11/12">
		  			<ul class="list-reset flex items-center">
                            		<li class="mr-1"><img src="images/icons_1/star_fill.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_fill.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_fill.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_line.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_line.svg" class="w-3 h-3"></li>
                            	</ul>
                            	<p class="text-sm text-gray-700 leading-relaxed py-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
		  		</div>
		  	</div>

		  	<div class="flex flex-col lg:flex-row my-2">
		  		<div class="w-full lg:w-1/12 ">
		  		<img src="images/2.jpg" class="rounded-full w-12 h-12 mx-auto">
		  		<p class="text-xs text-gray-800 text-center">Buyer2</p>
		  		</div>
		  		<div class="mx-3 my-1 w-full lg:w-11/12">
		  			<ul class="list-reset flex items-center">
                            		<li class="mr-1"><img src="images/icons_1/star_fill.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_fill.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_line.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_line.svg" class="w-3 h-3"></li>
                            		<li class="mr-1"><img src="images/icons_1/star_line.svg" class="w-3 h-3"></li>
                            	</ul>
                            	<p class="text-sm text-gray-700 leading-relaxed py-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
		  		</div>
		  	</div>
		  </div>

		   	<div id="tabcontent3" class="box">
		   	   <div class="flex border-b pb-5 my-3">
		   	   <div class="w-1/5">
		   	   <div class="flex items-center ">
		   			<div class="relative">
		   			<img src="images/1.jpg" class="rounded-full w-16 h-16">
		   			<div class="relative">
		   			<a href="#" class=" p-1 mt-1 rounded-full absolute bottom-0 right-0">
		   			<span class="w-3 h-3 rounded-full inline-block bg_green ml-1"></span>
		   			</a>
		   			</div>
		   			</div>
		   			<div class="leading-relaxed  mx-3">
		   			<p class="text-lg text-orange font-medium">Arul Prasad</p>
		   			<p class="text-sm custom_txt">arul@gmail.com</p>
		   			</div>
		   		</div>
		   	   
		   	   	</div>

		   	   	<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="py-1">Shipping Method : UPS</li>
		   	   			<li class="py-1">Payment Method : Cash on delivery</li>
		   	   			<li class="py-1">Quantity : 10</li>
		   	   		</ul>
		   	   	</div>
		   	   		<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="py-1">Order Date : 09-Feb-2020</li>
		   	   			<li class="py-1">Delivery Date : 22-Feb-2020</li>
		   	   			<li class="py-1">Order Status : <span class="bg_green rounded-full px-1 text-xs text-white mx-1 font-normal">Completed</span></li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   	<div class="w-1/3 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="flex "><span class="w-3/12">Address :</span> <span class="mx-2 w-10/12">
		   	   			#29, Abdul Aziz Road,<br/>
		   	   			Near Samuel public school,<br/>
		   	   			Rammurthy nagar, Bangalore-560016</span></li>
		   	   			<li class="flex pt-2"><span class="w-3/12">Amount :</span><span class="mx-2 w-10/12 text-gray-900 text-base font-semibold">
		   	   			$ 20,000</span></li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   </div>

		   	   <div class="flex border-b pb-5 my-3">
		   	   <div class="w-1/5">
		   	   <div class="flex items-center ">
		   			<div class="relative">
		   			<img src="images/2.jpg" class="rounded-full w-16 h-16">
		   			<div class="relative">
		   			<a href="#" class=" p-1 mt-1 rounded-full absolute bottom-0 right-0">
		   			<span class="w-3 h-3 rounded-full inline-block bg_green ml-1"></span>
		   			</a>
		   			</div>
		   			</div>
		   			<div class="leading-relaxed  mx-3">
		   			<p class="text-lg text-orange font-medium">Buyer1</p>
		   			<p class="text-sm custom_txt">buyer1@gmail.com</p>
		   			</div>
		   		</div>
		   	   
		   	   	</div>

		   	   	<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="py-1">Shipping Method : UPS</li>
		   	   			<li class="py-1">Payment Method : Credit card</li>
		   	   			<li class="py-1">Quantity : 200</li>
		   	   		</ul>
		   	   	</div>
		   	   		<div class="w-1/4 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="py-1">Order Date : 11-Feb-2020</li>
		   	   			<li class="py-1">Delivery Date : 26-Feb-2020</li>
		   	   			<li class="py-1">Order Status : <span class="bg_yellow rounded-full px-1 text-xs text-white mx-1 font-normal">Processing</span></li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   	<div class="w-1/3 px-4">
		   	   		<ul class="leading-relaxed list-reset text-sm custom_txt">
		   	   			<li class="flex "><span class="w-3/12">Address :</span> <span class="mx-2 w-10/12">
		   	   			#29, Abdul Aziz Road,<br/>
		   	   			Near Samuel public school,<br/>
		   	   			Rammurthy nagar, Bangalore-560016</span></li>
		   	   			<li class="flex pt-2"><span class="w-3/12">Amount :</span><span class="mx-2 w-10/12 text-gray-900 text-base font-semibold">
		   	   			$ 10,000</span></li>
		   	   			
		   	   		</ul>
		   	   	</div>
		   	   </div>
		   	</div>
@endsection
	<script>
	function custom_tab(tabid,contentid) {
    $(".tab").attr('class', 'tab');
    $("#"+tabid).attr('class', 'tab active');
    $(".box").attr('class', 'box');
     $("#"+contentid).attr('class', 'box active');
}
</script>
