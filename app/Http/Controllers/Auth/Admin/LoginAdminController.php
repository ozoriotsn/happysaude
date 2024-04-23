<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class LoginAdminController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('admin.auth.home',['user'=>$user]);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended('admin');
        }
        return redirect()->back()->with('error', 'Opa suas credenciais são invalidas');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
