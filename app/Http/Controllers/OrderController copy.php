<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Service;
use App\Models\Order;
use App\Models\Type;
use Carbon\Carbon;
use App\Interfaces\OrderInterface;

class OrderController extends Controller
{
    
    protected $orderInteface;

    public function __construct(OrderInterface $orderInteface)
    {
        $this->orderInteface = $orderInteface;
    }

    public function test(){
        return $this->orderInteface->sayHello();
    }

    public function index(){
        return $this->orderInteface->displayServices();
    }
    
    public function clientInfor(Request $request){
        return $this->orderInteface->clientInformation($request);
    }

    public function booking(Request $request){
        return $this->orderInteface->booking($request);
    }

    public function confirmOrder(Request $request)
    {
        //print_r($request->all());
        
        $address=$request->address;
        $long=$request->long;
        $lant=$request->lant;
        $service=$request->service;
        $type=$request->type;
        $userId=$request->user_id;
        $order_date=$request->serach_date;
        if(isset($request->vendor)){
            $strResult=explode("_",$request->vendor);
            $startTime=$strResult[0];
            $vendorId=$strResult[1];
        }
        
        if($vendorId>0 && $userId>0){

            $order = new Order;
            $order->vendor_id = $vendorId;
            $order->user_id = $userId;
            $order->service_id = $service;
            $order->type_id = $type;
            $order->start_time = $startTime;
            $order->end_time = $startTime;
            $order->order_date = $order_date;
            $order->long = $long;
            $order->latitu = $lant;
            $order->address = $address;
            $order->save(); // returns false

            return redirect('complete');
        }


    }

    public function completeOrder(){
        return view('booking.confirm');
    }

    public function booking1(Request $request)
    {
        print_r($request->all());
        //die();
        $address=$request->address;
        $long=$request->long;
        $lant=$request->lant;
        $service=$request->service;
        $type=$request->type;
        $timeSlotPrint=$this->printTime();


        //print_r($timeSlotPrint);
        
        if(isset($request->serach_date)){
            $orderDate=$request->serach_date;
            $bookingInfor=true; 
            $disableTime=[];
            $orders = Order::where('service_id', '=',$service)->where('order_date', '=',$orderDate)->orderBy('vendor_id', 'DESC')->get();
            //print_r($orders);

            $TempTimes=[];
            $vendor_id=-1;
            foreach($orders as $order){
                
                if($order->vendor_id==$vendor_id){
                    $TempTimes[$order->vendor_id][]=array("start"=>$order->start_time,"end"=>$order->end_time);
                }else{
                    $TempTimes[$order->vendor_id][]=array("start"=>$order->start_time,"end"=>$order->end_time);
                }

                $vendor_id=$order->vendor_id;
                 
                //user for data saving
                 /*
                 $typeInfor=Type::where('id', $order->type_id)->first();
                 $travelTime=0;
                 $expectedTime=($typeInfor->duration_hrs+$travelTime);
                 $endTime=$this->expectEndTime($order->start_time,$expectedTime);
                 */
                 //$this->getDisableTime();
            }
            
            print_r($TempTimes);
            $disableTime=$this->getDisableTime($TempTimes);
            print_r($disableTime);
            
           
            //die();

            $serviceVendors = Service::with('vendors')->where('id', '=',$service)->get();

            return view('booking.booking',compact(
                "disableTime",
                "timeSlotPrint",
                "serviceVendors",
                "address",
                "long",
                "lant",
                "service",
                "type",
                "bookingInfor"));

            }else{
            $bookingInfor=false;   
            return view('booking.booking',compact(
                "address",
                "long",
                "lant",
                "service",
                "type",
                "bookingInfor"));
            }
    }

    private function printTime(){
        $today = Carbon::createFromFormat('H:i:s','08:00:00');; // 2017-04-01 00:00:00
        $now = $today;
        $allTimes = [];
        array_push($allTimes,$now->format('g:i A')); //add the 00:00 time before looping
        for ($i = 0; $i <= 17; $i ++){ //95 loops will give you everything from 00:00 to 23:45
            $today->addMinutes(30); // add 0, 15, 30, 45, 60, etc...
            array_push($allTimes, $now->format('g:i A')); // inserts the time into the array like 00:00:00, 00:15:00, 00:30:00, etc.
        }
        
        return $allTimes;
    }
    
    private function expectEndTime($satrtTime,$timeGap){
        $nowtime = date("g:i A",strtotime($satrtTime));
        //echo $nowtime."--".$timeGap;
        //echo $date = date('g:i A', strtotime($nowtime . ' + '.$timeGap.' hours'));
        return $date = date('g:i A', strtotime($nowtime . " + $timeGap hours"));
    }

    private function getDisableTime($arrResult){
        $result=[];
        $temp=[];
        if(is_array($arrResult)){
            foreach($arrResult as $vendor=>$booktimes){
                $result[$vendor]=[];
                $temp=[];
                foreach($booktimes as $key=>$booking){           
                    $temp=array_merge($temp,$this->SplitTime($booking['start'],$booking['end'], "30"));
                }
                $result[$vendor]=$temp;
            }
        }
        return  $result;
    }
    
    

    private function SplitTime($StartTime, $EndTime, $Duration="60"){
        $ReturnArray = array ();// Define output
        $StartTime    = strtotime ($StartTime); //Get Timestamp
        $EndTime      = strtotime ($EndTime); //Get Timestamp
    
        $AddMins  = $Duration * 60;
    
        while ($StartTime <= $EndTime) //Run loop
        {
            $ReturnArray[] = date ("g:i A", $StartTime);
            $StartTime += $AddMins; //Endtime check
        }
        return $ReturnArray;
    }


}
