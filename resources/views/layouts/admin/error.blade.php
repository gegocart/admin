@if(\Session::has('error'))
        <div class="alert alert-error">
            {{\Session::get('error')}}
</div>
@endif