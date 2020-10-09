<form class="mb-0 mt-5" method="GET">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between search_sec pb-4">
       
 	
 		<div class="flex  items-center">
					<div>
      <div class="relative sort_by">
       <select name="sort_by" class="block appearance-none w-32 lg:w-40  border custom_border py-1 px-4 pr-8 rounded-full  focus:outline-none focus:bg-white focus:outline-none text-xs" id="sort_by" onchange="change()">
        	 
          <option value="asc"  {{request()->get('sort_by')=="asc"? 'selected':''}}>{{trans('paymentmethod.ascending')}}</option>
          <option value="desc" {{ request()->get('sort_by')=="desc"? 'selected':''}}>{{trans('paymentmethod.decending')}}</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 ">
          <svg class="fill-current h-4 w-4 select_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path></svg>
        </div>
      </div>
   
					</div>
					<div class="relative mx-3">
						<input type="text" id="search" value="{{request()->search}}" placeholder="Search" name="search" class="text-xs border custom_border rounded-full  py-1 focus:outline-none px-4 w-32 lg:w-40">
						<img src="images/icons_1/search.svg" class="w-3 h-3 absolute top-0 right-0 m-2">
					</div>
					</div>
					
			
				<div class="flex items-center py-3 lg:py-0">
					<p class="text-xs custom_txt mx-2">1-5 of 20</p>
					 <div class="relative sort_by">
        @php
        	$paginate_arr=array('10','15');
        @endphp

         <select onchange="change()" id="paginate" name="paginate" class="block appearance-none   border custom_border py-1 px-2 pr-5 rounded-full  focus:outline-none focus:bg-white focus:outline-none text-xs" id="grid-state">
          
          
          @foreach($paginate_arr as $paginate_value)
          <option value="{{$paginate_value}}" {{old('paginate', request()->get('paginate'))==$paginate_value? 'selected':''}}>{{$paginate_value}}</option>
          @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 ">
          <svg class="fill-current h-4 w-4 select_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path></svg>
        </div>
      </div>
				</div>
				
             </div> </form>