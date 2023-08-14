<?php

namespace Modules\Frontend\Actions;


use App\Models\Carts;
use App\Models\Customer;
use App\Models\PackageCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class CartAction
{
    public function handle()
    {
        $products = [];
        return view('Frontend::profile.cart', [
            'products' => $products,
        ]);
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $package_course = PackageCourse::where('id', $data['package_course_id'])->first();
        if (!empty($package_course)) {
            $data['price'] = $package_course['price'];
        }

        $check = Carts::where('customer_id', Auth::guard('frontend')->id())
            ->where('product_id', $data['product_id'])
            ->where('package_course_id', $data['package_course_id'])
            ->first();
        if (!empty($check)) {
            Carts::where('id', $check->id)->update([
                'amount' => $check['amount'] + $data['amount']
            ]);
        } else {
            $data['customer_id'] = Auth::guard('frontend')->id();
            Carts::create($data);
        }

        Splade::toast('Thêm vào giỏ hàng thành công!');

        return redirect()->back();
    }

}
