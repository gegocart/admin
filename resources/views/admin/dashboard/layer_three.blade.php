
		<div class="my-2">
			<div class="flex flex-col lg:flex-row">
				<div class="w-full lg:w-1/2 my-2">
					<div class="bg-white content_sec lg:mx-3 rounded">
					<h2 class="text-base count_txt font-semibold px-3 py-2 border-b">Top Selling Product</h2>
				<!-- *********** -->

				@foreach($topOrderItems as $product)

				   <a href="{{url('admin/product/description/'.$product->slug)}}">
					<div class="flex flex-col lg:flex-row px-2 py-2 lg:items-center">
					<div class="w-full lg:w-4/5 flex items-center">
						<div>

							<img src="{{url($product->productgallery[0]->thumbnailimage)}}" class="w-16 h-16"></div>
						<div class="px-3">
						<p class="text-xs text-orange font-semibold">
						<a href="{{url('admin/product/description/'.$product->slug)}}">
						{{$product->name}}
					</a>
					   </p>

						<p class="text-xs custom_txt">{{$product->sortDescription($product->description)}}</p>
						<p class="text-sm count_txt font-medium">{{$product->formattedPrice}}<span class="line-through custom_txt mx-1">{{$product->formattedPrice}}</span></p>
						</div>
					</div>
					<div class="w-full lg:w-1/5">
						<a href="{{url('admin/product/description/'.$product->slug)}}" class="border border_orange text-orange text-xs px-2 py-1 rounded-full view_link float-right lg:float-none">View details</a>
					</div>
					</div>
				</a>
				@endforeach
					
					</div>
				</div>
				<div class="w-full lg:w-1/4 my-2">
					<!-- <div class="bg-white content_sec mx-3 rounded px-3 py-4">
						<div class="text-center">
							<img src="images/1.jpg" class="w-20 h-20 rounded-full mx-auto">
							<p class="text-lg count_txt pt-2">Seller1</p>
							<p class="text-xs text-orange ">Top Seller</p>
							<p class="text-xs custom_txt py-5 leading-relaxed">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
							<div class="py-3"><a href="#" class="border border_orange text-orange text-xs px-2 py-1 rounded-full view_link ">View details</a></div>
						</div>
					</div> -->

					<div class="bg-white content_sec lg:mx-3 rounded h-full">
						<h2 class="text-base count_txt font-semibold px-3 py-2 border-b">Seller</h2>
						 @foreach($topSellers as $user)
			 <a href="{{url('/admin/seller/'.$user->id.'/details')}}">
					 
						<div class=" px-3 py-2">
						<div class="flex items-center">
							@if($user->image!="")
		   		            	<img src="{{url($user->image)}}" class="w-10 h-10 rounded-full">
		   	             	@else
		   		            	<img src="{{url('/profile/default.png')}}" class="w-10 h-10 rounded-full">
		   		             @endif
							<div class="mx-2 leading-tight">
							<p class="text-sm text-orange">{{$user->name}}</p>
							<p class="text-xs custom_txt">{{$user->email}}</p>
							</div>
						</div>
						</div>

				</a>
			@endforeach	
						
						
					
					</div>
				</div>
				<div class="w-full lg:w-1/4 my-2">
				
						<div class="bg-white content_sec lg:mx-3 rounded h-full">
						<h2 class="text-base count_txt font-semibold px-3 py-2 border-b">Buyer</h2>
					 @foreach($topBuyers as $user)
					   <a href="{{url('/admin/buyer/'.$user->id.'/details')}}">
						<div class=" px-3 py-2">
						<div class="flex items-center">
							@if($user->image!="")
		   		            	<img src="{{url($user->image)}}" class="w-10 h-10 rounded-full">
		   	             	@else
		   		            	<img src="{{url('/profile/default.png')}}" class="w-10 h-10 rounded-full">
		   		             @endif
							<div class="mx-2 leading-tight">
							<p class="text-sm text-orange">{{$user->name}}</p>
							<p class="text-xs custom_txt">{{$user->email}}</p>
							</div>
						</div>
						</div>
					</a>
					 @endforeach	
					
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- end -->