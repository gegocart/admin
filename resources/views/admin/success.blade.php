@if(\Session::has('success'))
      <div class="bg-green-500 text-white px-4 py-3 mt-6 rounded">
            {{\Session::get('success')}}
            </div>
 
@endif