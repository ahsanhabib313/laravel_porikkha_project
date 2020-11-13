<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class userController extends Controller
{



    public function createUser()
    {
        if(Auth::User()->role!="Admin"){
            return abort(503,'unauthorized');
        }
        return view('users.createUser' ,['user'=> Auth::user()]);

    }

    public function createUserId(Request $request)
    {
        if(Auth::User()->role!="Admin"){
            return abort(503,'unauthorized');
        }
        $this->validate($request, [
            'username' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required',


        ]);

        $username = $request['username'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
        $role = $request['role'];
        $semester = $request['semester'];

        $pattern = "/^[a-z]+(_|\.)?[a-z0-9]*@[a-z0-9]+\.(iit)\.(du)\.(ac)\.(bd)$/";

        $match =preg_match($pattern, $email);

        if($match ){
            $user = new User();
            $user->user_name = $username;
            $user->email = $email;
            $user->password = $password;
            $user->role = $role;
            $user->semester = $semester;

            $user->save();

            $message = 'User created Succesfully';
            return redirect()->intended('createUser')->with(['message' => $message]);
        }
        else
            $message_email = 'Email must be " ****@****.iit.du.ac.bd " format';
            return redirect()->intended('createUser')->with(['message_email' => $message_email]);




    }

    public function showUser(){
        if(Auth::User()->role!="Admin"){
            return abort(503,'unauthorized');
        }
        $data= User::all();
        return view('users.deleteUser',['user'=> Auth::user()])->with('data',$data);
    }

    public function deleteUser($id){
        if(Auth::User()->role!="Admin"){
            return abort(503,'unauthorized');
        }
        $data=User::find($id);
        $data->delete();
        return redirect()->intended('showUser')->with('message','Data has been deleted Successfully');
    }


public function getPassPage(){
    return view('users.changePassword' ,['user'=> Auth::user()]);
}

public  function changePassword(Request $request){

    $this->validate($request, [
        'newPassword' => 'required|min:5',
        'confirmationPassword' => 'required|same:newPassword',
    ]);

    $new_pass =bcrypt($request['newPassword']);


    $user = Auth::user();
    $user->password = $new_pass;

    $user->save();
    return redirect()->intended('passwordPage')->with('message','Password has been changed Successfully');
}





}



