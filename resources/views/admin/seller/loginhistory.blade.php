@extends('admin.seller.details')
@section('tab')

		  <div id="tabcontent4" class="box ">
		  		  	  	<div class="seller_table bg-white">
			<table class="w-full">
				<thead>
					<tr>
						<th>{{trans('details.datetime')}}</th>
						<th>{{trans('details.ip')}}</th>
						<th>{{trans('details.browser')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($activitylogs as $activitylog)
					<tr class="seller_list rounded  bg-white">
					<td class="px-3 py-3"><p class="text-xs">{{$activitylog->created_at}}</p></td>
					<td class="px-3 py-3"><p class="text-xs">{{$activitylog->properties['ip']}}</p></td>
					<td class="px-3 py-3"><p class="text-xs">{{$activitylog->properties['details']}}</p></td>
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