<div class="custom_tab">
		  		<ul class="list-reset flex flex-wrap items-center border-b text-sm custom_txt">
		  		<a href="{{url('/admin/product/description/'.$product->slug)}}"><li id="tab1" class="px-3 py-2 mr-3 lg:mr-5 tab {{request()->segment('3')=='description' ? 'active' : ''}}" >{{trans('product.description')}}</li></a>
		  		
		  		<a href="{{url('/admin/product/reviews/'.$product->slug)}}"><li id="tab2" class="px-3 py-2 mr-3 lg:mr-5 tab {{request()->segment('3')=='reviews' ? 'active' : ''}}" >{{trans('product.reviews')}} ({{$product->rating->count()}})</li></a>
		  		<a href="{{url('/admin/product/orders/'.$product->slug)}}"><li id="tab3" class="px-3 py-2 mr-3 lg:mr-5 tab {{request()->segment('3')=='orders' ? 'active' : ''}}" >{{trans('product.orders')}}</li></a>
		  		</ul>
</div>