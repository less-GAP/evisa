<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class ProfileAction
{
    public function handle()
    {
        $customer_info = Auth::guard('frontend')->user();
        $customer_info['photo'] = 'http://localhost:9100/upload/file/Upload/64d2074573be1_avatar.png';
        $customer_info['link'] = url('registration/' . $customer_info['username']);

        return view('Frontend::profile.profile', [
            'customer_info' => $customer_info,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required'
        ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập hoặc email'
            ]
        );

        if ($validator->passes()) {
            $check = false;
            //check customer active
            $cus = Customer::where('username', $request->get('username'))
                ->where('id', '<>', Auth::guard('frontend')->id())->first();
            if (!empty($cus)) {
                $validator->errors()->add(
                    'username',
                    'Tên đăng nhập đã tồn tại!'
                );
                $check = true;
            }

            $cus = Customer::where('email', $request->get('email'))
                ->where('id', '<>', Auth::guard('frontend')->id())->first();
            if (!empty($cus)) {
                $validator->errors()->add(
                    'email',
                    'Email đã tồn tại!'
                );
                $check = true;
            }
            if ($check == true) {
                return Redirect::back()->withErrors($validator);
            }
        }

        $customer = Customer::find(Auth::guard('frontend')->id());
        $customer->fill($data);
        $customer->save();

        Splade::toast('Cập nhật thông tin thành công!');

        return redirect()->route('profile');

    }

    public function logout()
    {
        Auth::guard('frontend')->logout();
        return redirect()->route('home');
    }

}
