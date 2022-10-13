<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

    public function contactUs(){
        return view('contactUs');
    }

    public function ourTeams(){
        return view('ourTeams');
    }

    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $this->validate($request, [
            'username'=>'required|min:5',
            'password'=>'required',
        ],);
        $user = User::where('username',$request->username)
        ->where('password',$request->password)
        ->first();

        if($user){
            return redirect()->back()->with('message', 'Login successful');
        }
        return $request;
    }

    public function register(){
        return view('registration');
    }

    public function registerSubmit(Request $request){
        $validate = $request->validate([
            'username'=>'required|min:5|max:20',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ],);

        $user = new  User();
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();

        return $request;
    }


}
