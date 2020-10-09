@if(\Session::has('error'))
         <div class="bg-red-500 text-white px-4 py-3 mt-3 rounded">
            {{\Session::get('error')}}
            </div>
 
@endif