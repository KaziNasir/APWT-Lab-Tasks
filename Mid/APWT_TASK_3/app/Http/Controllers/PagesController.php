<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
            session()->put("type",'user');
            session()->put("username",$request->username);
            return redirect()->route('uDashboard');
        }

        $admin = Admin::where('username',$request->username)
        ->where('password',$request->password)
        ->first();

        if($admin){
            session()->put("type",'admin');
            session()->put("username",$request->username);
            return redirect()->route('aDashboard');
        }

        return redirect()->back()->with('message', 'Login failed. Incorrect username or password');
    }

    public function logout(){
        session()->flush();
        return redirect('/');
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
        session()->put('message', 'Registration successful. Please login to continue');
        return view('login');
    }


}
