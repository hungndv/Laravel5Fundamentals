@if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissible {{session('flash_message_important') ? 'flash_message_important' : ''}}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('flash_message')}}
    </div>
@endif