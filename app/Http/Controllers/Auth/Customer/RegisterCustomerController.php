<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function redirect;
use function view;

class RegisterCustomerController extends Controller
{
    public function register()
    {
        return view('customer.auth.register');
    }

    public function store(Request $request)
    {

        //dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'document' => 'required|string|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

       $customer =  Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'document' => $this->formatDocument($request->document),
            'password' => Hash::make($request->password),
        ]);

       if($request->cep){
           // CUSTOMER ADDRESS

               $customerAddress = new CustomerAddress();
               $customerAddress->customer_id = $customer->id;
               $customerAddress->name = $request->name;
               $customerAddress->street = $request->street;
               $customerAddress->number = $request->number;
               $customerAddress->district = $request->district;
               $customerAddress->city = $request->city;
               $customerAddress->state = $request->state;
               $customerAddress->zip_code = $request->cep;
               $customerAddress->complement = $request->complement;
               //$customerAddress->phone = $request->phone;
               $customerAddress->save();


//           $customerAddress  = array(
//               'name' => $request->name,
//               'street' => $request->street,
//               'number' => $request->number,
//               'district' => $request->district,
//               'city' => $request->city,
//               'state' => $request->state,
//               'zip_code' => $request->cep,
//               'complement' => $request->complement,
//               'customer_id' => $customer->id,
//           );
//           dd($customerAddress);
//           CustomerAddress::create($customerAddress);

       }


        Auth('customer')->loginUsingId($customer->id);
        $check = Auth('customer')->check();


        $referer = request()->headers->get('referer');
        $explode = explode('/',$referer);
        if($explode[3] === 'checkout'){
            return redirect()->route('checkout.finish');
        }

        return redirect('customer/login')->with('message', 'Sua conta foi cadastrada com sucesso faça seu login! '.$check.' ');
    }

    public function formatDocument($value){
        $arr = ['.','-'];
        return str_replace($arr,'',$value);

    }
}
