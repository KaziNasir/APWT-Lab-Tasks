<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function __construct(){
        $this->middleware('ValidAdmin');
    }

    public function aDashboard(){
        $users = User::all();
        return view('admin.dashboard')->with('users', $users) ;
    }


public function userEdit(Request $request){
    $user = User::where('id', $request->id->first());
    return view('admin.userEdit')->with('user', $user) ;
}

public function userEditSubmit(Request $request){
    $validate = $request->validate([
        'username'=>'required|min:5|max:20',
        'email'=>'required|email|unique:users,email',
    ],);

    $user = User::where('id', $request->id->first());
    $user->username = $request->username;
    $user->email = $request->email;
    $user->save();
    session()->put('message', 'Update successful.');
    return redirect('admin.aDashboard');
}

public function userDelete(Request $request){
    $user = User::where('id', $request->id)->first();
    $user->delete();

    session()->put('message', 'Delete successful.');
    return redirect('admin.aDashboard');
}
}
