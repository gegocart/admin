
	<div class="container mx-auto">
		<label>From</label><p>{{$from}}</p><br>
    <label>Card design</label><p>{{$cardname}}</p>
		@foreach($giftcard as $giftcards)
                       <div class="flex w-1/3">
                         <div class=" w-1/2 border">
                           <img  src="{{asset('uploads/'.$design)}}" class="w-1/2 px-1 py-1">
                           <div class="flex items-center px-2 py-3">
                             <div class="w-1/2 border-r"><img src="http://localhost:3000/images/gift.png" class=""></div>
                             <div class="w-1/2 px-5"><h1 class="text-grey-darker font-medium"> {{ $giftcards->amount }}</h1></div>
                             
                           </div>
                           <div class="flex items-center ">
                             <div class="w-1/2 border-r"><h1 class="text-grey-darker font-medium">Giftcard-Id: {{ $giftcards->code }}</h1></div>
                             <div class="w-1/2 px-5"><h1 class="text-grey-darker font-medium">Expires-on: 
                             	{{date("d-m-Y", strtotime($giftcards->expire_on))}}
                             </h1></div>
                             
                           </div>
                           <div class=" py-4  border-t">
                             <p class="text-base px-4 text-grey-darker">{{$message}}</p>
                           </div>
                         </div>
                       </div>
                       @endforeach
                   </div>
