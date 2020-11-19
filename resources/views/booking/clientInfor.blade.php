@extends('layouts.app')

@section('content')
<div id="viewDiv"></div>
<div class="container">
<form action="/booking" method="POST">
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
         name="address"
        type="text"
      />
      <input
        class="form-control"
        name="long" value="0"
        type="hidden"
      />
      <input
        class="form-control"
        name="lant" value="0"
        type="hidden"
      />
      <input
        class="form-control"
        name="service" value="{{$service}}"
        type="hidden"
      />
      <input
        class="form-control"
        name="type" value="{{$type}}"
        type="hidden"
      />
  </div>
  </br>
  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Continue</button>
</div> 
</form>
</div>
@endsection
