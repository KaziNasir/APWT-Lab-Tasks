<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

public function __construct(){
    $this->middleware('ValidateLogin');
}


public function uDashboard(){
    $user = User::where('username', session()->get('username'))->first();
    return view('user.dashboard')->with('user', $user) ;
}

public function uDashboardSubmit(Request $request){
    $validate = $request->validate([
        'username'=>'required|min:5|max:20',
        'email'=>'required|email|unique:users,email',
    ],);

    $user = User::where('username', session()->get('username'))->first();
    $user->username = $request->username;
    $user->email = $request->email;
    $user->save();
    session()->put('message', 'Update successful.');
    return view('user.dashboard')->with('user', $user) ;
}

}
