	<div class="my-2">
			<div class="bg-white content_sec lg:mx-3 rounded ">
				<h2 class="text-base count_txt font-semibold px-3 py-2 border-b">Order Status</h2>
				<div class="w-full flex flex-wrap lg:flex-row items-center border-b">
					<div class="py-2 w-1/2 lg:w-1/4  px-2 leading-relaxed border-r">
						<div class=" py-3"> 
						   <p class="custom_txt text-base">Total Orders</p>
						   <p class="count_txt text-2xl">{{$orders}}</p>
					   </div>
					</div>
					<div class="py-2 w-1/2 lg:w-1/4  px-2 leading-relaxed"> 
						<a href="{{url('/admin/order/completed')}}" class="flex items-center">
							<p class="text-2xl lg:text-base text-blue-500 font-semibold">Completed</p>
						</a>
					    <p class="count_txt text-lg">{{$completed}}</p>
					</div>
					<div class="py-2 w-1/2 lg:w-1/4  border-r border-l px-2 leading-relaxed"> 
						<a href="{{url('/admin/order/processing')}}" class="flex items-center">
							<p class="text-2xl lg:text-base text-blue-500 font-semibold">Processing</p>
						</a>
						<p class="count_txt text-lg">{{$processing}}</p>
					</div>
					<div class="py-2 w-1/2 lg:w-1/4  px-2 leading-relaxed"> 
					   <a href="{{url('/admin/order/shipped')}}" class="flex items-center">
							<p class="text-2xl lg:text-base text-blue-500 font-semibold">Shipped</p>
						</a>
						<p class="count_txt text-lg">{{$shipped}}</p>
					</div>
				</div>
				<div class="py-5  leading-relaxed px-3">
					<p class="custom_txt text-base">Total Payments</p>
					<p class="text-orange text-2xl">{{$totalpayment}}</p>
				</div>
				<div class="w-full lg:w-3/4 px-3 lg:px-8 py-4 border-l hidden">
					<div id="chartContainer" style="height: 300px; width: 100%;margin-left: auto;"></div>
				</div>
			</div>

				</div>
		<!-- end -->
		<!-- start -->