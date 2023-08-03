<?php


namespace Modules\Admin\Actions\ShippingMethod;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $shipping_method = new ShippingMethod();
            if (isset($data['id']) && $data['id'] > 0) {
                $shipping_method = ShippingMethod::find($data['id']);
            }

            $shipping_method->fill($data);
            $shipping_method->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $shipping_method
            ];
        } catch (\Throwable $e) {
            $output = [
                'code' => 0,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
        return $output;
    }
}
