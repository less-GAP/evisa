<?php

namespace Modules\Frontend\Actions;


use App\Models\Customer;
use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use ProtoneMedia\Splade\Facades\Splade;

class ProductAction
{
    public function handle()
    {
        $products = [];
        //lay danh sach
        $products = PackageCourse::with('products')
            ->whereHas('products', function ($query) {
                $query->where('status', 'A');
            })
            ->orderBy('product_id', 'ASC')
            ->get()->toArray();

        return view('Frontend::profile.product', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request)
    {
        $product = [];
        $form = [];
        $product = PackageCourse::with('products')
            ->whereHas('products', function ($query) {
                $query->where('status', 'A');
            })
            ->where('id', $request->route('id'))
            ->first()->toArray();
        if (!empty($product)) {
            $pros = PackageCourseProduct::where('package_course_id', $product['id'])->select('*')->get()->toArray();
            if (!empty($pros)) {
                foreach ($pros as $n => $p) {
                    $product['pros'][$n] = $p['product_detail'];
                }
            }
            $form = [
                'product_id' => $product['product_id'],
                'package_course_id' => $product['id'],
                'price' => $product['price'],
                'amount' => 1
            ];
        }
        $customer_info = Auth::guard('frontend')->user();
        return view('Frontend::profile.product_detail', [
            'product' => $product,
            'customer_info' => $customer_info,
            'form' => $form
        ]);
    }

}
