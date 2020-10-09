<!-- sidebar start -->
		<div class="w-32 menu-open hidden lg:block absolute lg:relative">
			<div class=" admin_menu h-full">
			
				<ul class="list-reset text-xs leading-loose  py-2 custom_shadow h-full">

				<li class="px-3 py-2 {{request()->segment('2') == 'dashboard' ? 'active':''}}">
				<a href="{{url('/admin/dashboard')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.dashboard')
					<span class="mt-1">{{trans('sidebar.dashboard')}}</span></a>
				</li>
			
		    @php
		        $class='';
		        $array=array('buyer');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
			
				<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/buyer')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
						@include('admin.sidebar.buyer')
				
				<span class="mt-1">{{trans('sidebar.buyer')}}</span></a>
				</li>
				 @php
		        $class='';
		        $array=array('seller');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
					<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/seller')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
						@include('admin.sidebar.seller')
			


				<span class="mt-1">{{trans('sidebar.seller')}}</span></a>
				
				</li>
		

                  @php
		        $class='';
		        $array=array('order');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2 {{$class}}" >
                    <a href="#" class="flex flex-col items-center px-2 py-2 rounded active_link"> 
                    	@include('admin.sidebar.order')
                    <span class="mt-1">{{trans('sidebar.orders')}}</span>
                    </a>







				<!-- ***** -->
				<ul class="list-reset sidebar_submenu py-2 rounded-r">
					<li class="px-3 py-1"><a href="{{url('/admin/giftorder')}}" class="flex items-center"><img src="{{url('images/icons_1/approve.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.giftorder')}}</span></a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/order/completed')}}" class="flex items-center"><img src="{{url('images/icons_1/approve.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.completed')}}</span></a></li>  
					<li class="px-3 py-1"><a href="{{url('/admin/order/pending')}}" class="flex items-center"><img src="{{url('images/icons_1/pending.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.pending')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/processing')}}" class="flex items-center"><img src="{{url('images/icons_1/process.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.processing')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/paymentfailed')}}" class="flex items-center"><img src="{{url('images/icons_1/payment.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.payment')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/shipped')}}" class="flex items-center"><img src="{{url('images/icons_1/truck.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.shipped')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/hold')}}" class="flex items-center"><img src="{{url('images/icons_1/truck.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.hold')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/refunded')}}" class="flex items-center"><img src="{{url('images/icons_1/refund.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.refunded')}}</span></a></li>
					<li class="px-3 py-1"><a href="{{url('/admin/order/cancel')}}" class="flex items-center"><img src="{{url('images/icons_1/refund.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.cancel')}}</span></a></li>
				</ul>
				
				</li>

				   @php
		        $class='';
		        $array=array('mailtemplates');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
                <li class=" py-2 {{$class}}" >
                     <a href="{{url('/admin/mailtemplates')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">   
                     	@include('admin.sidebar.mail_template')
                     	<span class="mt-1">{{trans('sidebar.mailtemplate')}}</span></a>

                </li>
                   @php
		        $class='';
		        $array=array('product');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/product')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.product')
				<span class="mt-1">{{trans('sidebar.product')}}</span></a>
				<!-- ***** -->
<!-- 				<ul class="list-reset sidebar_submenu py-2 rounded-r">
					<li class="px-3 py-1"><a href="{{url('/admin/product/pending')}}" class="flex items-center"><img src="{{url('images/icons_1/pending.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.pending')}}</span></a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/product/approve')}}" class="flex items-center">
					<img src="{{url('images/icons_1/approve.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.approved')}}</span>
					</a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/product/cancel')}}" class="flex items-center">
					<img src="{{url('images/icons_1/cancel.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.cancel')}}</span></a></li> 
				</ul> -->
				<!-- ***** -->
				</li>
				   @php
		        $class='';
		        $array=array('store');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/store')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
				
							@include('admin.sidebar.store')

				<span class="mt-1">{{trans('sidebar.stores')}}</span></a>
				<!-- ***** -->
				<!-- <ul class="list-reset sidebar_submenu py-2 rounded-r"> -->
<!-- 					<li class="px-3 py-1"><a href="{{url('/admin/store/pending')}}" class="flex items-center"><img src="{{url('images/icons_1/pending.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.pending')}}</span></a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/store/approve')}}" class="flex items-center">
					<img src="{{url('images/icons_1/approve.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.approved')}}</span>
					</a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/store/cancel')}}" class="flex items-center">
					<img src="{{url('images/icons_1/cancel.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.cancel')}}</span></a></li> 
				</ul> -->
				<!-- ***** -->
				</li>
	         @php
		        $class='';
		        $array=array('transaction');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/transaction')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
								@include('admin.sidebar.transaction')
				
				<span class="mt-1">{{trans('sidebar.transaction')}}</span></a>
				<!-- ***** -->
<!-- 				<ul class="list-reset sidebar_submenu py-2 rounded-r">
					<li class="px-3 py-1"><a href="{{url('/admin/transaction/pending')}}" class="flex items-center"><img src="{{url('images/icons_1/pending.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.pending')}}</span></a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/transaction/approve')}}" class="flex items-center">
					<img src="{{url('images/icons_1/approve.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.approved')}}</span>
					</a></li> 
					<li class="px-3 py-1"><a href="{{url('/admin/transaction/cancel')}}" class="flex items-center">
					<img src="{{url('images/icons_1/cancel.svg')}}" class="w-4 h-4"><span class="mx-2">{{trans('sidebar.cancel')}}</span></a></li> 
				</ul> -->
				<!-- ***** -->
				</li>
				<!--  @php
		        $class='';
		        $array=array('setting');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2 {{$class}}">
				<a href="{{url('/admin/setting')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.settings')
             

				<span class="mt-1">{{trans('sidebar.settings')}}</span></a>
				
				</li> -->
				 @php
		        $class='';
		        $array=array('shippingmethod');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2  {{$class}}">
					<a href="{{url('/admin/shippingmethod')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.shipping_method')
						<span class="mt-1 whitespace-no-wrap">{{trans('sidebar.shippingmethod')}}</span></a>
					 
				</li>
				 @php
		        $class='';
		        $array=array('paymentmethod');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2  {{$class}}">
					<a href="{{url('/admin/paymentmethod')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.shipping_method')
						<span class="mt-1 whitespace-no-wrap">{{trans('sidebar.paymentmethod')}}</span></a>
					 
				</li>
				 @php
		        $class='';
		        $array=array('reviews');
		        if(in_array(\Request::segment('2'),$array))
    			 {
		           $class='active';
		         }
		     @endphp
				<li class="px-3 py-2  {{$class}}">
					<a href="{{url('/admin/reviews')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
					@include('admin.sidebar.shipping_method')
						<span class="mt-1 whitespace-no-wrap">{{trans('details.reviews')}}</span></a>
					 
				</li>	
				<!-- <li>
					<a href="{{url('/admin/countryshippingmethod')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
						<span class="mt-1">{{trans('sidebar.paymentmethod')}}</span></a>
					</a>
				</li> -->
				<!-- <li>
					<a href="{{url('/admin/setting')}}" class="flex flex-col items-center px-2 py-2 rounded active_link">
						<span class="mt-1">{{trans('sidebar.paymentmethod')}}</span></a>
					</a>
				</li> -->	
				</ul>
			</div>
		</div>
	<!-- sidebar end -->