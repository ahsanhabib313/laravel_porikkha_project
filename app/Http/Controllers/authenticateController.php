<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authenticateController extends Controller
{


    public function loginPage(){
        return view('login');
    }

    public function signIn(Request $request)
    {
        $this->validate($request,[
            'email' =>'required',
            'password'=>'required'


            ]);

        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }

        elseif (!(Auth::attempt(['email' => $email])) && Auth::attempt(['password' => $password])){

                 $message = 'Email is invalid';
               return redirect()->intended('/')->with('message',$message);
        }
        elseif ((Auth::attempt(['email' => $email])) && !(Auth::attempt(['password' => $password]))){

            $message = 'Password is invalid';
            return redirect()->intended('/')->with('message',$message);
        }
        elseif (!(Auth::attempt(['email' => $email])) && !(Auth::attempt(['password' => $password]))){

            $message = 'Email and Password does not match';
            return redirect()->intended('/')->with('message',$message);
        }



    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

}
