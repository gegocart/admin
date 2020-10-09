@extends('admin.seller.details')
@section('tab')


	  <div id="tabcontent3" class="box ">
		  		  	  	<div class="seller_table bg-white overflow-y-auto">
			<table class="w-full">
				<thead>
					<tr>
						<th>{{trans('details.logname')}}</th>
						<th>{{trans('details.description')}}</th>
						<th>{{trans('details.properties')}}</th>
						<th>{{trans('details.createdat')}}</th>
						<th>{{trans('details.dateandtime')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($activitylogs as $activitylog)
					<tr class="seller_list rounded  bg-white">
					<td class="px-3 py-3"><p class="text-xs">{{$activitylog->log_name}}</p></td>
					<td class="px-3 py-3"><p class="text-xs">{{$activitylog->description}}</p></td>
					<td class="" width="40%"><p class="text-xs">
                     <table class="w-full">
			         	<tbody>
	
							@foreach($activitylog->properties as $key=>$properties)
			                 <tr>
								<td width="20%" class="px-3 py-1"><p class="text-xs font-semibold txt_dark ">{{ucfirst($key)}}</p></td>
			                     <td width="80%" class="px-3 py-1"><p class="text-xs ">  
								{{$properties}} 
								</p></td>
			                 </tr> 
							@endforeach
              </tbody>
			</table>
					</p></td>
					<td class="px-3 py-3"><p class="text-xs">{{date('d-M-Y',strtotime($activitylog->created_at))}}</p></td>
					<td class="px-3 py-3"><p class="text-xs">{{date('d-M-Y H:i',strtotime($activitylog->created_at))}}</p></td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<div class="custom-paginate py-2">
					{{$activitylogs->links()}}
		   @if(!count($activitylogs)>0)
                <p class="text-xs">No Records</p>
            @endif
				</div>
				</div>
		  		  </div>
@endsection		  		  