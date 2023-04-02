<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('auth.login',$data);
    }
    public function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username',$request->username)->first();
        if(!$user){
            return back()->with('error','Login Gagal');
        }
        if(Auth::attempt($request->only('username','password'))){
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success','Selamat Datang');
        }
        return back()->with('error','Login Gagal');

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
