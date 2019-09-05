@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </div>
@elseif(session()->get('success') === true)
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif