<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function index() {
        $data['']=

        $data['introduction'] = Introduction::all();
        $data['introductionImagePath'] = 'uploads/introduction-photos/';

        return view('frontend.about.introduction.introduction', $data);
    }
}
