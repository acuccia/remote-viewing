@if(Session::has('message'))
    <div class="text-center">
        <h2>{{ Session::get('message') }}</h2>
    </div>
@endif