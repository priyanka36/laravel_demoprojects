<?php

namespace App\Http\Controllers\Backend\Authentication;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\MembershipRegistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    public function loginPage()
    {

        return view('authentication.login-page');
    }

    public function verifyLogin(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $request->validate([
            'email' => 'email|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route('dashboard')->with('success', 'Successfully Logged In !!');
        } else {
            return redirect()->back()->with(['message' => 'Invalid Username and Password', 'alert-type' => 'error']);


        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Successfully Logged Out !!');
    }

    public function dashboard()
    {

        return view('backend.dashboard');
    }






}
