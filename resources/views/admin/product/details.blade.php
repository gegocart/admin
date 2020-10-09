@extends('layouts.admin.layout')
@section('content')
	
		<div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
		<h2 class="text-lg text-gray-700 font-semibold">{{trans('product.productdetails')}}</h2>
	
		</div>
		<!-- start -->
		<div class="flex flex-col lg:flex-row">
		<div class="w-fll lg:w-3/5 my-2 lg:my-5 lg:pr-3 h-auto">
			<div class="content_sec px-4 py-4 bg-white rounded">
				<img src="{{url('/uploads/'.$product->productgallery[0]->imagepath)}}" class="w-auto mx-auto rounded" style="height: 500px;">
			</div>
		</div>
		<div class="w-full lg:w-2/5 my-2 lg:my-5 lg:pl-3 h-auto">
			<div class="content_sec px-3 py-3 bg-white rounded h-full">
				<div>
				<h2 class="text-base text-gray-700 font-semibold">{{$product->name}}</h2>
				<div class="flex items-center  my-3 ">

			    <h2 class="text-xl text-gray-900 font-semibold">{{$price}}</h2>
			    <span class="text-sm line-through txt_red mx-3">{{$price}}</span>

			    </div>
				<div class="my-3">
					<ul class="list-reset flex items-center">
                            		@for($i=1;$i<=5;$i++)

                            	    @if($i<=$rating)
                            			<li class="mr-1"><img src="{{url('/images/icons_1/star_fill.svg')}}" class="w-3 h-3"></li>
                                    
                                    @else
                                         <li class="mr-1"><img src="{{url('/images/icons_1/star_line.svg')}}" class="w-3 h-3"></li>
                                    @endif

                            	@endfor
                            	</ul>
				</div>
					<p class="text-sm leading-loose text-gray-700 my-3">
						{{$product->description}}
					</p>
					<div class="my-2">
						<ul class="list-reset text-sm text-gray-700">
							<li class="font-semibold py-2">
								@if($product->status=='1')
							<p class="font-semibold">Status : <span class="bg_green rounded-full px-2 py-1 text-xs text-white mx-1 font-normal">Active</span></p></li>
							@endif
							@if($product->status=='0')
							<p class="font-semibold">Status : <span class="bg_red rounded-full px-2 py-1 text-xs text-white mx-1 font-normal">InActive</span></p></li>
							@endif
							<li class="font-semibold py-2"><p>Store : <span class="text-sm  mx-1 font-normal text-gray-900">{{$product->stores->name}}</span></p></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		</div>
		<!-- end -->
		<!-- start -->
		<div class="content_sec px-3 py-3 bg-white rounded">
		    @include('admin.product.tab')
		  <div class="py-5 custom_tab_content">
		  	 @yield('tab')

		   </div>
	   	</div>
	  </div>
	</div>

@endsection
