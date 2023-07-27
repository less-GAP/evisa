<?php


namespace Modules\Admin\Actions\Product;


use App\Models\Product;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetProductDetailAction
{
    public function handle(Request $request)
    {
        $product = [];
        $id = $request->route('id');
        if($id > 0){
            $product = Product::where('id',$id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $product
        ];
    }
}
