@if(Session::has('notice'))

    <div class="alert">
        {{ Session::get('notice') }}
    </div>

@endif