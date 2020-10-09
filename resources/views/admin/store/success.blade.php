@if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
</div>
@endif