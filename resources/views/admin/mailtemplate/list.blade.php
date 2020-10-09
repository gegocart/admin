@extends('layouts.admin.layout')
@section('content')
@include('layouts.admin.success')
 <div class="flex items-center justify-between pt-2 pb-4 border-b" style="border-color: 1px solid #f3f3f3;">
    <h2 class="text-base text-gray-700 font-semibold">Mail Template</h2>
   <!--  <a href="#" class="bg_orange text-white text-sm px-4 py-1 rounded-full">Create Product</a> -->
    </div>

   <div class="seller_table bg-white overflow-y-auto my-3">
            <table class="w-full">
                <thead>
                    <tr>
       
                        <th>{{trans('templatelist.subject')}}</th>
                        <th>{{trans('templatelist.status')}}</th>
                        <th>{{trans('templatelist.updateddate')}}</th>
                        <th width="10%">{{trans('templatelist.action')}}</th>
                       
                    </tr>
                </thead>
            
            <tbody>
     @foreach($mailtemplates as $mailtemplate)
            <tr  class="seller_list rounded  bg-white">
            <!-- <td class="px-3 py-3"><input type="checkbox">{{$order->id}}</td> -->
            <!-- <td class="px-3 py-3">1</td> -->
            <td class="px-3 py-3">
                <p class="text-sm whitespace-no-wrap">{{$mailtemplate->subject}}</p>
            </td>
<!--             <td class="px-3 py-3">
                <p class="text-sm">{{$mailtemplate->mail_content}}</p>
            </td>
             -->
            
            <td class="px-3 py-3 text-sm">
              
               {{ucfirst($mailtemplate->status)}}
             
            </td>
            <td class="px-3 py-3">
                <p class="text-sm">{{date('d-M-Y',strtotime($mailtemplate->updated_at))}}</p>
            </td>


       <td class="px-3 py-3">
                <ul class="list-reset flex items-center action_icon"> 
     

            <li>
    <a href="{{url('/admin/mailtemplates/'.$mailtemplate->id.'/edit')}}">
    <svg class="fill-current w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve" width="512px" height="512px"><g><g>
    <g>
        <g>
            <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893    " data-original="#000000" class="active-path" fill=""/>
            <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04     C386.027,77.92,386.027,64.373,377.707,56.053z" data-original="#000000" class="active-path" fill=""/>
        </g>
    </g>
</g></g> </svg></a>
</li>
<!-- <li>
                    <a href="#">
                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" width="512px" height="512px"><g><g>
    <g>
        <g>
            <path d="M501.978,371.851l-141.999-50c-7.811-2.753-16.379,1.352-19.13,9.167c-2.752,7.814,1.353,16.379,9.167,19.13l141.999,50     c7.837,2.759,16.388-1.378,19.13-9.167C513.897,383.167,509.792,374.602,501.978,371.851z" data-original="#000000" class="active-path" fill=""/>
            <path d="M227.595,99.398c12.248-14.593,19.034-23.886,19.54-24.583c4.868-6.703,3.379-16.083-3.324-20.951     c-6.704-4.867-16.083-3.381-20.952,3.324C177.381,119.801,89.518,200.956,8.234,242.612c-0.025,0.013-0.049,0.025-0.073,0.038     c-3.444,1.765-6.01,4.752-7.277,8.277c-1.178,3.275-1.179,6.867,0,10.147c1.267,3.524,3.833,6.512,7.277,8.277     c0.025,0.013,0.049,0.025,0.073,0.038c88.138,45.166,173.306,128.696,214.626,185.424c4.844,6.67,14.217,8.214,20.952,3.324     c6.703-4.868,8.191-14.248,3.324-20.951c-0.507-0.697-7.292-9.99-19.54-24.583C251.984,368.814,260.28,306.299,260.28,256     C260.28,205.667,251.973,143.167,227.595,99.398z M206.347,388.375C160.741,338.492,105.24,290.488,46.193,256     c58.936-34.422,114.404-82.337,160.154-132.374c7.51,16.124,13.45,35.958,17.534,58.205c-36.1,5.387-63.882,36.592-63.882,74.169     s27.781,68.782,63.883,74.17C219.796,352.418,213.857,372.251,206.347,388.375z M189.998,256     c0-22.458,16.537-41.124,38.073-44.466c1.45,14.259,2.21,29.166,2.21,44.466c0,15.3-0.76,30.208-2.21,44.466     C206.535,297.124,189.998,278.458,189.998,256z" data-original="#000000" class="active-path" fill=""/>
            <path d="M359.979,190.15l141.999-50c7.814-2.751,11.919-11.317,9.167-19.13c-2.75-7.813-11.319-11.916-19.13-9.167l-141.999,50     c-7.814,2.751-11.919,11.317-9.167,19.13C343.598,188.793,352.163,192.903,359.979,190.15z" data-original="#000000" class="active-path" fill=""/>
            <path d="M354.997,271h141.999c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15H354.997c-8.284,0-15,6.716-15,15     C339.997,264.284,346.713,271,354.997,271z" data-original="#000000" class="active-path" fill=""/>
        </g>
    </g>
</g></g> </svg>

</a>
</li>               -->      
 </ul>
            </td>
            </tr>
            @endforeach
            <!-- ****** -->
            </tbody>
            </table>
             
                <div class="custom-paginate py-2">
                 {{ $mailtemplates->links() }}
          @if(!count($mailtemplates)>0)
                <p class="text-xs">No Records</p>
            @endif
                 </div>
 
         
        </div>
               


@endsection 

<style>
    .pagination
    {
      display : flex;
    }
</style>
