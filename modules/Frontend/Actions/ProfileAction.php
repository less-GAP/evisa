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
            //check customer active
            $username = $request->get('username');
            $cus = Customer::where(function ($q) use ($username) {
                $q->where('username', $username)
                    ->orWhere('email', $username);
            })->where('id', '<>', Auth::guard('frontend')->id())->first();
            if (empty($cus)) {
                $validator->errors()->add(
                    'username',
                    'Tên đăng nhập đã tồn tại!'
                );
                return Redirect::back()->withErrors($validator);
            }
        }

        $customer = Customer::find(Auth::guard('frontend')->id());
        $customer->fill();
        $customer->save();


        Splade::toast('Cập nhật thông tin thành công!');

        return redirect()->route('profile');

    }

}
