<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <style>

            
            </style>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    
    </head>
<body>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
<h1 class="display-4">Step 2</h1>
</div>

<div class="container">
<script type="text/javascript">
      $(function () {
          $('#datetimepicker12').datetimepicker({
              inline: true,
              sideBySide: true,
              format: 'DD/MM/YYYY'
          });

          $('#datetimepicker12').on('dp.change', function(event) { 
              //alert(event.date); 
              var formatted_date = event.date.format('YYYY-MM-DD');
              $('#my_hidden_input').val(formatted_date);
           });

          //$("#datetimepicker1").data("DateTimePicker").date('2017/04/23 23:34:23');
          /*
          $(".datepicker .datepicker-days").on('click', 'td.day', function (date) {
                console.log(date);
                //alert(date);
            });
         */   
      });
   </script>
<form>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Name</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
</form>

<form action="/booking" method="post">
{{ csrf_field() }}
<input
        class="form-control"
        placeholder="Enter your address" name="address"
        type="text" value="{{$address}}"
      />
      <input
        class="form-control"
        placeholder="longe" name="long"
        type="text" value="{{$long}}"
      />
      <input
        class="form-control"
        placeholder="latitude" name="lant"
        type="text" value="{{$lant}}"
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
      
    <div class="row">
      <div style="overflow:hidden;">
      <div class="form-group">
          <div class="row">
            <div class="col-md-8">
                <div id="datetimepicker12"></div>
            </div>
          </div>
      </div>
      <input type="hidden" name="serach_date" id="my_hidden_input" value="2020-10-30">
    </div>

    <?php if($bookingInfor){ ?>  
    <div class="row">
      <div class="col-6">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
              Time
            </div>
            <ul class="list-group list-group-flush">
            <input class="form-check-input" type="hidden" name="booking" value="true">
            @foreach($timeSlotPrint as $key=>$timeslot)
            
            <li class="list-group-item">
                {{ $timeslot}}
                <input
              class="form-control"
              name="start_time" value="{{$timeslot}}"
              type="hidden"
            />
              @foreach($serviceVendors as $service)
                    {{ $service->name}}  
                    @foreach($service->vendors as $ven)
                    <?php
                     
                     $result=[];
                     foreach($disableTime as $key=>$val){
                        if($ven->id==$key){
                          $result=$val;
                        break;
                        }
                     }

                     if(in_array($timeslot,$result)) {
                          $isDisable=true;
                          $is_book='Reseved';
                     }else{
                        $isDisable=false;
                        $is_book='';
                     }
                     
                     ?> 
                    <input class="form-check-input" type="radio" name="vendor" value="{{ $ven->id }}">{{ $ven->name}}{{ $is_book}} 
                    @endforeach
                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Book</button>
                @endforeach
              @endforeach
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="row">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
 
</form>

</div>
</body>
</html>
