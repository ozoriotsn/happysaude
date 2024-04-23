<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function back;
use function view;

class ForgotPasswordCustomerController extends Controller
{
    protected $guard ='customer';

    public function getEmail()
    {

        return view('customer.auth.password.email');
    }

    public function postEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:customers',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token, 'created_at' => Carbon::now()
            ]
        );

        Mail::send('customer.auth.password.verify', ['token' => $token], function($message) use ($request) {
            $message->from('admin@example.com');
            $message->to($request->email);
            $message->subject('Redefinição de senha');
        });

        return back()->with('message', 'Enviamos o link de redefinição de senha por e-mail!');
    }
}
