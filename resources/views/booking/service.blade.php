@extends('layouts.app')

@section('content')

<div class="container">
<form action="/client" method="post">
{{ csrf_field() }}
  <div class="card-deck mb-3 text-center">
  @foreach($services as $service)
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">
        <input class="form-check-input" type="radio" name="service" id="exampleRadios1" value="{{ $service->id }}">
        {{ $service->name }}
        </h4>
      </div>

      <div class="card-body">
      @foreach($service->types as $type)
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" value="{{ $type->id }}" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1">
          {{ $type->description }} 
          <h5 class="card-title pricing-card-title">
          ${{ $type->price_hrs }} <small class="text-muted">/per hour</small>
          <label>Estimate time {{ $type->duration_hrs}} hours</label>
          </h5>
          
          </label>
          </div>
      @endforeach
      </div>
    </div>
  @endforeach
  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Continue</button>
</div> 
</form>
</div>
@endsection
