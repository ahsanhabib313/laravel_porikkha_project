<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',['user'=> Auth::user()]);

    }
}
