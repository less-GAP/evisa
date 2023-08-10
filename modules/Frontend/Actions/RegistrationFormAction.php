<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Hash;

class RegistrationFormAction
{
    public function handle()
    {
        return view('Frontend::registration');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
                'username' => 'required|unique:customers',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'email' => 'required|email',
                'phone' => 'required',
                'referral_code' => 'required|exists:customers,username'
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $customer = new Customer();
        $customer->fill($data);
        $customer->save();

        Splade::toast('Register successfull!');

        return redirect()->route('home');
    }
}
