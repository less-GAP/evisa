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

class OrderAction
{
    public function index()
    {

        $orders = Orders::where('customer_id', Auth::guard('frontend')->id())
            ->orderBy('created_at', 'Desc')
            ->paginate(10);

        return view('Frontend::profile.order', [
            'orders' => $orders,
        ]);
    }

    public function detail(Request $request)
    {
        $order = Orders::where('customer_id', Auth::guard('frontend')->id())
            ->where('id', $request->route('order_id'))
            ->orderBy('created_at', 'Desc')
            ->first();

        return view('Frontend::profile.order_detail', [
            'order' => $order,
        ]);
    }


}
