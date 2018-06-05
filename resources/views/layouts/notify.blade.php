
@if (!empty($errors->all())) 
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $message)
        {{$message}} <br>
    @endforeach
</div>
@endif

@if (!\Request::is('/'))
<div class="col-sm pull-right">
<label>Your unique ID:</label>
    <input type="text" value="{{$registration->unique_id}}" readonly disabled>
</div>
<div style="background-color: lightgrey; padding: 8px;margin-right: 5px;" class="pull-right">
    <p style="color: red; margin: 0px"><b>Please note and save your unique ID, in order to return and see your information.</b></p>
</div>
@endif