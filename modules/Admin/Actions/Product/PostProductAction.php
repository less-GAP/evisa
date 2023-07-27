<?php


namespace Modules\Admin\Actions\Product;

use App\Models\Product;
use Illuminate\Http\Request;

class PostProductAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $product = new Product();
            if (isset($data['id']) && $data['id'] > 0) {
                $product = Product::find($data['id']);
            }

            if (!isset($data['slug']) || $data['slug'] == '') {
                $data['slug'] = \Str::slug($data['name']);
            }

            $product->fill($data);
            $product->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $product
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
