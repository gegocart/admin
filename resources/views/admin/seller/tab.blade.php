		  	

		  	<div class="custom_tab"> 
		  		 
		  		<ul class="list-reset flex flex-wrap items-center border-b ">
		  		<a href="{{url('/admin/seller/'.$user->id.'/details')}}"> 	<li id="tab5" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'details' ? 'active':''}}" >{{trans('detailstab.profile')}}</li></a>
		  		<a href="{{url('/admin/seller/'.$user->id.'/orders')}}">	<li id="tab1" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'orders' ? 'active':''}}" >{{trans('detailstab.order')}}</li></a>
		  		<a  href="{{url('/admin/seller/'.$user->id.'/product')}}">
		  		<li id="tab1" class="px-3 py-2 mr-3 lg:mr-5 tab {{request()->segment('4') == 'product' ? 'active':''}}">Product</li>
		  		</a>
		  		<a  href="{{url('/admin/seller/'.$user->id.'/store')}}">
		  		<li id="tab2"  class="px-3 py-2 mr-3 lg:mr-5 tab {{request()->segment('4') == 'store' ? 'active':''}}" >Store</li>
		  		</a>
		  		<a href="{{url('/admin/seller/'.$user->id.'/activities')}}">	<li id="tab3" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'activities' ? 'active':''}}" >{{trans('detailstab.activitylog')}}</li></a>
		  		<a href="{{url('/admin/seller/'.$user->id.'/loginhistory')}}">	<li id="tab4" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'loginhistory' ? 'active':''}}" >{{trans('detailstab.loginhistory')}}</li></a>
		  		</ul>
		  	</div>
		  	<script>

		  	</script>