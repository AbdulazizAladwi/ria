@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li class="alert-md-4 alert-danger">{{$error}}</li>
@endforeach
</ul>
@endif