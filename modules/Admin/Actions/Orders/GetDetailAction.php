<?php


namespace Modules\Admin\Actions\Orders;


use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $order = [];
        $id = $request->route('id');
        if ($id > 0) {
            $order = Orders::where('id', $id)->first()->toArray();
            if (!empty($order)) {
                $details = [];
                $order_details = OrderDetails::where('order_id', $order['id'])->get()->toArray();
                if (!empty($order_details)) {
                    foreach ($order_details as $k => $v) {
                        $product = Product::where('id', $v['product_id'])->first()->toArray();
                        if (!empty($product)) {
                            $details[] = [
                                'order_id' => $v['order_id'],
                                'product_id' => $v['product_id'],
                                'price' => $v['price'],
                                'amount' => $v['amount'],
                                'extra' => $v['extra'],
                                'product_name' => $product['name'],
                                'product_image' => $product['image'],
                                'product_image_url' => $product['image_url'],
                                'product_type' => $product['type'],
                                'subtotal' => $v['amount']*$v['price']
                            ];
                        }
                    }
                }
                $order['details'] = $details;
            }
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $order
        ];
    }
}
