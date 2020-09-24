<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGateway;

class PayOrderController extends Controller
{
public function  store(){
$paymentgateway=new PaymentGateway();
dd($paymentgateway);

}
}
