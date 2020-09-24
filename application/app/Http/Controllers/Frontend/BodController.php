<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodController extends Controller
{
    public function index() {
        $data['bod'] = Bod::all();

        return view('frontend.about.bod.bod', $data);
    }
}
