		  	

		  	<div class="custom_tab"> 
		  		 
		  		<ul class="list-reset flex flex-wrap items-center border-b ">
		  			<li id="tab5" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'details' ? 'active':''}}" ><a href="{{url('/admin/buyer/'.$user->id.'/details')}}"> {{trans('detailstab.profile')}}</a></li>
		  			<li id="tab1" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'orders' ? 'active':''}}" onclick="custom_tab('tab1','tabcontent1')"><a href="{{url('/admin/buyer/'.$user->id.'/orders')}}">{{trans('detailstab.order')}}</a></li>
		  			<!-- <li id="tab6" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'giftorders' ? 'active':''}}" onclick="custom_tab('tab6','tabcontent6')"><a href="{{url('/admin/buyer/'.$user->id.'/giftorders')}}">{{trans('detailstab.giftorder')}}</a></li> -->
		  			<li id="tab2" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'reviews' ? 'active':''}}" onclick="custom_tab('tab2','tabcontent2')"><a href="{{url('/admin/buyer/'.$user->id.'/reviews')}}">{{trans('detailstab.reviews')}}</a></li>
		  		<li id="tab3" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'activities' ? 'active':''}}" onclick="custom_tab('tab3','tabcontent3')"><a href="{{url('/admin/buyer/'.$user->id.'/activities')}}">	{{trans('detailstab.activitylog')}}</a></li>
		  			<li id="tab4" class="px-3 py-2 mr-5 tab {{request()->segment('4') == 'loginhistory' ? 'active':''}}" onclick="custom_tab('tab4','tabcontent4')"><a href="{{url('/admin/buyer/'.$user->id.'/loginhistory')}}">{{trans('detailstab.loginhistory')}}</a></li>
		  		</ul>
		  	</div>
		