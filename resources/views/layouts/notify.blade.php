
@if (!empty($errors->all())) 
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $message)
        {{$message}} <br>
    @endforeach
</div>
@endif