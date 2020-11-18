@extends('layouts.app')

@section('content')
<div class="container">
<form action="/booking" method="post">
{{ csrf_field() }}
<div class="form-group">
    <label for="formGroupExampleInput">Please Type address</label>
    <div id="locationField">
     <!--
      <input
        class="form-control"
        id="autocomplete"
        placeholder="Enter your address"
        onFocus="geolocate()"
        type="text"
      />
      -->
      <input
        class="form-control"
        placeholder="Enter your address" name="address"
        type="text"
      />
      <input
        class="form-control"
        placeholder="longe" name="long"
        type="text"
      />
      <input
        class="form-control"
        placeholder="latitude" name="lant"
        type="text"
      />
      <input
        class="form-control"
        placeholder="service" name="service" value="{{$service}}"
        type="text"
      />
      <input
        class="form-control"
        placeholder="type" name="type" value="{{$type}}"
        type="text"
      />
  </div>
  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Continue</button>
</div> 
</form>
</div>
@endsection
