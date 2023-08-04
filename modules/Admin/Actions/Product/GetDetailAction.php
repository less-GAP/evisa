<?php


namespace Modules\Admin\Actions\Product;


use App\Models\Product;
use App\Models\ProductPackage;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $product = [];
        $id = $request->route('id');
        if($id > 0){
            $product = Product::where('id',$id)->first();
            if($product->type == 'package'){
                $packages = ProductPackage::where('package_id',$id)->select('product_descr')->get();
                if(!empty($packages)){
                    $pas = [];
                    foreach ($packages as $k => $v){
                        $pas[] = $v->product_descr;
                    }
                    $product->packages = $pas;
                }
            }
        }

        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $product
        ];
    }
}
