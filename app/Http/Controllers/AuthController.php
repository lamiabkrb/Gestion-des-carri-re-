<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handleLogin(AuthRequest $request){
        $credentials = ($request->only(['email','password']));
        if(Auth::attempt($credentials)){
          return redirect()->route('dashboard');
        }return redirect()->back()->with('error_msg','Parametre de connexion non reconnu ');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
