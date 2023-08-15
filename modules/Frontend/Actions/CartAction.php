<?php

namespace Modules\Frontend\Actions;


use App\Models\Carts;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\PackageCourse;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class CartAction
{
    public function handle()
    {
        $cart = [];
        $cart = Carts::where('customer_id', Auth::guard('frontend')->id())
            ->orderBy('product_id', 'ASC')
            ->get()
            ->toArray();
        return view('Frontend::profile.cart', [
            'cart' => $cart,
            'form' => [],
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

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $check = false;
        if (!empty($data)) {
            foreach ($data as $key => $v) {
                $quantity = explode('-', $key);
                $product_id = $quantity[1];
                $package_course_id = $quantity[2];
                $package_course = PackageCourse::where('id', $package_course_id)->first();
                if (!empty($package_course)) {
                    $cart = Carts::where('customer_id', Auth::guard('frontend')->id())
                        ->where('product_id', $product_id)
                        ->where('package_course_id', $package_course_id)
                        ->first();

                    if (!empty($cart)) {
                        Carts::where('id', $cart->id)->update([
                            'amount' => $v,
                            'price' => $package_course['price']
                        ]);
                        $check = true;
                    }
                }
            }
        }
        if ($check == true) {
            Splade::toast('Cập nhật giỏ hàng thành công!');
        }
        return redirect()->back();
    }


    public function delete(Request $request)
    {
        $product_id = $request->route('product_id');
        $package_course_id = $request->route('package_course_id');

        $cart = Carts::where('customer_id', Auth::guard('frontend')->id())
            ->where('product_id', $product_id)
            ->where('package_course_id', $package_course_id)
            ->delete();

        Splade::toast('Xóa sản phẩm thành công!');

        return redirect()->back();
    }

    public function checkout(Request $request)
    {

        $shippings = ShippingMethod::where('status', 'A')->get()->toArray();

        $payments = PaymentMethod::where('status', 'A')->get()->toArray();

        $customer_info = Auth::guard('frontend')->user();
        $cart = Carts::where('customer_id', Auth::guard('frontend')->id())
            ->orderBy('product_id', 'ASC')
            ->get()
            ->toArray();

        $form = [
            'customer_id' => $customer_info['id'],
            'customer_email' => $customer_info['email'],
            's_name' => $customer_info['name'],
            's_phone' => $customer_info['phone'],
            's_province' => null,
            's_district' => null,
            's_ward' => null,
            's_address' => null,
            'shipping_id' => null,
            'payment_id' => null,
            'shipping_cost' => 0
        ];

        $data = $request->all();

        if (!empty($data)) {
            if (isset($data['shipping_id']) && $data['shipping_id'] != '') {
                $ship = ShippingMethod::where('status', 'A')->where('id', $data['shipping_id'])->first()->toArray();
                if (!empty($ship)) {
                    $form['shipping_id'] = $ship['id'];
                    $form['shipping_cost'] = $ship['cost'];
                    Splade::toast('Cập nhật phương thức vận chuyển thành công!')->autoDismiss(10);
                }
            }

            if (isset($data['payment_id']) && $data['payment_id'] != '') {
                $payment = PaymentMethod::where('status', 'A')->where('id', $data['payment_id'])->first()->toArray();
                if (!empty($payment)) {
                    $form['payment_id'] = $payment['id'];
                    Splade::toast('Cập nhật phương thức thanh toán thành công!')->autoDismiss(10);
                }
            }

            $form['s_province'] = $data['s_province'] ?? null;
            $form['s_district'] = $data['s_district'] ?? null;
            $form['s_ward'] = $data['s_ward'] ?? null;
            $form['s_address'] = $data['s_address'] ?? null;
            $form['payment_id'] = $data['payment_id'] ?? null;
            $form['s_name'] = $data['s_name'] ?? null;
            $form['s_phone'] = $data['s_phone'] ?? null;

        }

        return view('Frontend::profile.checkout', [
            'cart' => $cart,
            'shippings' => $shippings,
            'payments' => $payments,
            'form' => $form
        ]);
    }


    function doneCheckout(Request $request)
    {
        $data = $request->all();
        $customer_info = Auth::guard('frontend')->user();
        $subtotal = 0;
        $order_data = [
            'customer_id' => $data['customer_id'],
            'customer_name' => $customer_info['name'],
            'customer_phone' => $customer_info['phone'],
            'customer_email' => $customer_info['phone'],
            'shipping_id' => $data['shipping_id'],
            'shipping_cost' => $data['shipping_cost'],
            'shipping_status' => 'waiting_confirm',
            'payment_id' => $data['payment_id'],
            'payment_status' => 'waiting_confirm',
            'notes' => null,
            'coupon_code' => null,
            's_name' => $data['s_name'],
            's_phone' => $data['s_phone'],
            's_address' => $data['s_address'],
            's_ward' => $data['s_ward'],
            's_district' => $data['s_district'],
            's_province' => $data['s_province'],
            's_country' => 'VN',
            'subtotal' => 0,
            'discount' => 0,
            'total' => 0,
            'subtotal_discount' => 0,
            'order_status' => 'new'
        ];

        $order_detail = [];

        $cart = Carts::where('customer_id', Auth::guard('frontend')->id())
            ->orderBy('product_id', 'ASC')
            ->get()
            ->toArray();
        if (!empty($cart)) {
            foreach ($cart as $k => $pro) {
                $package_course = PackageCourse::where('id', $pro['package_course_id'])->first()->toArray();
                if (!empty($package_course)) {
                    $subtotal += $package_course['price'] * $pro['amount'];
                    $order_detail[] = [
                        'order_id' => 0,
                        'product_id' => $pro['product_id'],
                        'package_course_id' => $pro['package_course_id'],
                        'price' => $package_course['price'],
                        'amount' => $pro['amount'],
                        'extra' => $package_course,
                    ];
                }
            }
        }

        $order_data['subtotal'] = $subtotal;
        $order_data['subtotal_discount'] = $subtotal;
        $order_data['total'] = $subtotal + $order_data['shipping_cost'];

        $order_id = \DB::table('orders')->insertGetId($order_data);
        if ($order_id > 0) {
            foreach ($order_detail as $detail) {
                $detail['order_id'] = $order_id;
                OrderDetails::create($detail);
            }
            Carts::where('customer_id', Auth::guard('frontend')->id())->delete();
        }
        return redirect('profile/checkout-complete/' . $order_id);
    }

    function checkoutComplete()
    {
        return view('Frontend::profile.checkout_complete', [

        ]);
    }
}
