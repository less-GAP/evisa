<?php


namespace Modules\Admin\Actions\Package;


use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
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
        if ($id > 0) {
            $product = Product::where('id', $id)->first()->toArray();
            if (!empty($product)) {
                $packages = PackageCourse::where('product_id', $id)->select('*')->get()->toArray();
                if (!empty($packages)) {
                    $pas = [];
                    foreach ($packages as $k => $v) {
                        $pas[$k] = $v;
                        //lay thong tin san pham
                        $pros = PackageCourseProduct::where('package_course_id', $v['id'])->select('product_descr')->get()->toArray();
                        if (!empty($pros)) {
                            foreach ($pros as $n => $p) {
                                $pas[$k]['products'][$n] = $p['product_descr'];
                            }
                        }
                    }
                    $product['packages'] = $pas;
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
