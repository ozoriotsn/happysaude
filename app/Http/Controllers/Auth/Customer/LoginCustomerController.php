<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use function redirect;
use function view;

class LoginCustomerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('customer.auth.home',['user'=>$user]);
    }

    public function login()
    {
        return view('customer.auth.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('customer')->attempt($req->only(['email', 'password'])))
        {
            $referer = request()->headers->get('referer');
            $explode = explode('/',$referer);
            if($explode[3] === 'checkout'){
                return redirect()->route('checkout.finish');
            }

            return redirect()->route('customer.home');
        }

        return redirect()->back()->with('error', 'Seus dados de acesso são invalidos');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect()->route('customer.login');
    }
}
