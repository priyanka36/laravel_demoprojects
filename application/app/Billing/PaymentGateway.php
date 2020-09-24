<?php

namespace App\Billing;
use Illuminate\Support\Str;
class PayementGateway{
    public function charge($account){
return['amount'=>$account,
'confirmation_number'=>Str::random()];
    }
}