@extends('layouts.app')

@section('content')

<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
  <div class="col-4">
    <form action="/booking" method="post">
    <input
        class="form-control"
        placeholder="Enter your address" name="address"
        type="hidden" value="{{$address}}"
      />
      <input
        class="form-control"
        placeholder="longe" name="long"
        type="hidden" value="{{$long}}"
      />
      <input
        class="form-control"
        placeholder="latitude" name="lant"
        type="hidden" value="{{$lant}}"
      />
      <input
        class="form-control"
        placeholder="service" name="service" value="{{$service}}"
        type="hidden"
      />
      <input
        class="form-control"
        placeholder="type" name="type" value="{{$type}}"
        type="hidden"
      />
    {{ csrf_field() }}
    <div class="form-row align-items-center">
      <div class="col-auto">
        <input type="text" class="date form-control" readonly="true" name="serach_date" value="{{$orderDate}}" placeholder="Click here">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Availability</button>
      </div>
    </div>
  </form>
</div>

  <div class="col-8">

  <?php if($bookingInfor){ ?> 
  <form action="/confirm" method="post">
  <input
        class="form-control"
        name="address"
        type="hidden" value="{{$address}}"
      />
      <input
        class="form-control"
        name="long"
        type="hidden" value="{{$long}}"
      />
      <input
        class="form-control"
        name="lant"
        type="hidden" value="{{$lant}}"
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
      <?php //echo $orderDate; ?>
      <input type="hidden" class="date form-control" name="serach_date" value="{{$orderDate}}" id="booking-date-id" placeholder="Date">
      <input
        class="form-control"
       name="user_id" value="{{Auth::id()}}"
        type="hidden"
      />
      <input class="form-check-input" type="hidden" name="booking" value="true">
  {{ csrf_field() }}
  <div class="card">
    <div class="card-header">
      Time Slot
    </div>

    @foreach($timeSlotPrint as $key=>$timeslot)
    <div class="card-body">
      <h5 class="card-title">{{ $timeslot}} (Select radio button and book)</h5>
      @foreach($serviceVendors as $service)
                    @foreach($service->vendors as $ven)
                    <?php
                     
                     $result=[];
                     foreach($disableTime as $key=>$val){
                        if($ven->id==$key){
                          $result=$val;
                        break;
                        }
                     }
                     $disableRadio=''; 
                     if(in_array($timeslot,$result)) {
                          $isDisable=true;
                          $is_book='Reserved';
                          $disableRadio='disabled selected'; 
                     }else{
                        $isDisable=false;
                        $is_book='';
                     }
                     
                     ?> 
                    <p class="card-text">
                    <input class="form-check-input" type="radio" {{ $disableRadio }} name="vendor" value="{{$timeslot}}_{{ $ven->id }}">
                    {{ $ven->name}}
                    <?php if($isDisable){ ?> 
                      <label class="text-danger">{{ $is_book}}</label>                      
                    <?php }else{ ?>
                      {{ $is_book}}
                      <button type="submit" class="btn btn-success">Book</button>
                    <?php } ?> 
                    </p>
                    @endforeach
      @endforeach
      <hr>
    </div>
    @endforeach

 </div>
 </form>
<?php } ?>


  </div>
</div>
</div>

<script type="text/javascript">
    var selectDate = {!! json_encode($orderDate, JSON_HEX_TAG) !!};
    var today;
    var nowDate = new Date();
    var currDate= new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    if(selectDate==''){
      today=selectDate;
    }else{
      today = new Date();
    }
   

    $('.date').datepicker(
      { 
       format: 'yyyy-mm-dd',
       startDate: currDate 
     }
     );

     $('.date').datepicker()
      .on('changeDate', function(e) {
          $strPicDate=e.format(0,"yyyy-mm-dd");
          $('#booking-date-id').val($strPicDate);
      });
</script> 

  

@endsection