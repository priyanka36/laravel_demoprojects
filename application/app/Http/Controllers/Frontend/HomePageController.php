<?php

namespace App\Http\Controllers\Frontend;

use App\Homepage;
use App\Models\Slider;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index() {
        $data['slider'] = Slider::all();
        $data['homepage']=Homepage::all();
        $data['sliderImagePath'] = 'uploads/slider-photos/';

        $data['homepageImagePath']='uploads/homepage-photos/';

        return view('frontend.homepage.home_page', $data);
    }
}
