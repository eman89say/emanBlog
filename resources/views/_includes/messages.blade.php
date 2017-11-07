@if(Session::has('success'))
    <div class="columns">
      <div class="column m-r-50 m-l-50">
        <div class="notification is-success" role="alert">
            <strong>Success : </strong> {{Session::get('success')}}
        </div>
      </div>
    </div>
@endif


@if(count($errors)>0)
    <div class="columns">
      <div class="column  m-r-50 m-l-50">
        <div class="notification is-warning" role="alert">
            <strong> Errors : </strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      </div>
    </div>
@endif