<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(LoginUser $request){
        $infologin = [
            'username'=> $request->username,
            'password'=> $request->password,
        ];

        if(Auth::attempt($infologin)){ //jika auth sukses maka redirect
            return redirect('/')->with('successlogin', 'Anda Berhasil Login');
        }else{
            return redirect('/login')->with('error','Username Dan Password yang dimasukan tidak valid');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('logout','Anda Berhasil Logout');
    }

    public function loginAdmin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::guard("admin")->attempt($credentials)){
            return redirect('/dashboard')->with('success','Berhasil');
        } else {
            return redirect('/loginadmin')->with('error','Username dan password salah.');
        }
    }

    public function logoutadmin() {
        Auth::guard("admins")->logout();
        return redirect('/loginadmin')->with('logout', 'berhasil logout');
    }

    public function create(RegisterUserRequest $request){

    $data = [
        'nama' => $request->nama,
        'email'=> $request->email,
        'username'=> $request->username,
        'password'=> Hash::make($request->password)
    ];

    User::create($data);

    $infologin = [
        'username'=> $request->username,
        'password'=> $request->password,
    ];

    if(Auth::attempt($infologin)){ //jika auth sukses maka redirect
        return redirect('/')->with('successregister', Auth::user()->nama.' Anda Berhasil Register dan Auto Login');
    }else{
        return redirect('/login')->with('error','Username Dan Password yang dimasukan tidak valid');
    }
    }
    
}