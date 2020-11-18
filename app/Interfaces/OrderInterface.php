<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderInterface
{
    
    public function sayHello();
    public function displayServices();
    public function clientInformation(Request $request);
    public function booking(Request $request);
    public function orderConfirm(Request $request);

    
}