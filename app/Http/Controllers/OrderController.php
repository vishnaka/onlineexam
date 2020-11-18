<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function confirmOrder(Request $request){
        return $this->orderInteface->orderConfirm($request);
    }

    public function completeOrder(){
        return view('booking.confirm');
    }

}
