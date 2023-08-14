<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;

class RegistrationFormAction
{
    public function handle(Request $request)
    {
        $check = Customer::where('username', $request->route('ref_code'))->first();
        if (!empty($check)) {
            return view('Frontend::registration', [
                'ref_code' => $request->route('ref_code')
            ]);
        } else {
            Toast::title('Đường dẫn không chính xác!')->danger();
            return redirect()->route('home');
        }
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
        $data['status'] = 'A';
        $data['customer_group'] = 1;
        $customer = new Customer();
        $customer->fill($data);
        $customer->save();

        Splade::toast('Register successfull!');

        return redirect()->route('login');
    }
}
