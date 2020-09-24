<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index() {
        $data['team'] = Team::all();

        return view('frontend.about.team.team', $data);
    }
}
