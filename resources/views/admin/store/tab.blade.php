 
		  	<div class="custom_tab">
		  		<ul class="list-reset flex items-center border-b ">
		  			<a href="{{url('/admin/store/profile/'.$store->slug)}}">
		  				<li id="tab1" class="px-3 py-2 mr-5 tab {{request()->segment('3')=='profile'?'active':''}}" onclick="custom_tab('tab1','tabcontent1')">{{trans('store.profile')}}</li>
		  			 </a>
		  			 <a href="{{url('/admin/store/description/'.$store->slug)}}">
		  		       <li id="tab2" class="{{request()->segment('3')=='description'?'active':''}} px-3 py-2 mr-5 tab" onclick="custom_tab('tab2','tabcontent2')">{{trans('store.description')}}</li>
		  		     </a>
		  		     <a href="{{url('/admin/store/seller/'.$store->slug)}}">

		  				<li id="tab3" class="{{request()->segment('3')=='seller'?'active':''}} px-3 py-2 mr-5 tab" onclick="custom_tab('tab3','tabcontent3')">{{trans('store.seller')}}</li>
		  			</a>
		  		</ul>
		  	</div>
 