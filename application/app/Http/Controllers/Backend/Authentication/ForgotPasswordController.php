<?php

namespace App\Http\Controllers\Backend\Authentication;

use App\Mail\ResetPassword;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $this->validate($request,[
            'email' => 'required'
        ]);


        $email = $request->get('email');

        $emailExist = User::where('email',$email)->first();

        if(!is_null($emailExist)){

            $user = new \App\Models\ResetPassword();
            $user->email = $email;
            $user->token = $this->verificationKey(32);
            $user->save();

            Mail::to('maramerosa@gmail.com')->send(new ResetPassword($user));

            $data['success'] = 'Verification Token Has Send To Email';
        }else{
            $data['errorss'] = 'Email Donot Exist!';
        }

        return $data;


    }

    private function verificationKey($size)
    {
        $verificationTokenGeneration = '';
        $keys = range('A', 'Z');

        for ($i = 0; $i < 2; $i++) {
            $verificationTokenGeneration .= $keys[array_rand($keys)];
        }

        $length = $size - 2;

        $key = '';
        $keys = range(0, 32);

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $verificationTokenGeneration . $key;

    }



    public function resetPassword(Request $request)
    {
        $token1 = $request->get('verification-token');
        $mytime = Carbon::now();
        $token = \App\Models\ResetPassword::select('created_at','token')->where('token',$token1)->first();
        if(count(collect($token)->toArray()) < 1){
            return view('authentication.token-expire');
        }
        $checkTokenExpire = $token->created_at;

        $hourdiff = round((strtotime($checkTokenExpire) - strtotime($mytime))/3600, 1);


        $data['token'] = $token1;
        if((-1 * $hourdiff) > 1)
        {
            return view('authentication.token-expire');

        }else{


            return view('authentication.reset-password',$data);
        }

    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required'
        ]);
        $token = $request->input('token');
        $newPassword =  bcrypt($request->input('password'));

        $email = \App\Models\ResetPassword::select('email','token')->where('token',$token)->first();

        User::where('email',$email->email)->update(['password' => $newPassword]);

        return redirect()->route('login')->with('success','Password Reset Successfully!!');;


    }
}
