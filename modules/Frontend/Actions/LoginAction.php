<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\Frontend\Requests\LoginRequest;
use ProtoneMedia\Splade\Facades\Splade;

class LoginAction
{
    public function handle()
    {
        return view('Frontend::login');
    }

    public function login(LoginRequest $request)
    {
//        $validator = $request->validate([
//            'username' => 'required',
//            'password' => 'required',
//        ],
//            [
//                'username.required' => 'Vui lòng nhập tên đăng nhập hoặc email'
//            ]);

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập hoặc email'
            ]
        );

        if ($validator->passes()) {
            //check customer active
            $username = $request->get('username');
            $cus = Customer::where(function ($q) use ($username) {
                $q->where('username', $username)
                    ->orWhere('email', $username);
            })->where('status', 'A')->first();
            if (empty($cus)) {
                $validator->errors()->add(
                    'username',
                    'Tên đăng nhập hoặc email không chính xác!'
                );
                return Redirect::back()->withErrors($validator);
            }
        }


        $credentials = $request->getCredentials();
        if (!Auth::guard('frontend')->validate($credentials)) {
            $validator->errors()->add(
                'username',
                'Tên đăng nhập hoặc email không chính xác!'
            );
            return Redirect::back()->withErrors($validator);
        } else {
            $user = Auth::guard('frontend')->getProvider()->retrieveByCredentials($credentials);
            Auth::guard('frontend')->login($user);
            return redirect()->route('profile');
        }
        Splade::toast('Register successfull!');

        return redirect()->route('home');
    }
}
