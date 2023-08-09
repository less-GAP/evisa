<?php

namespace Modules\Frontend\Actions;


use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
use App\Models\Product;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class HomeAction
{
    public function handle()
    {

        $query = Product::where('type', 'package')->where('status', 'A');
        $packages = $query->get()->toArray();
        if (!empty($packages)) {
            foreach ($packages as $k => $v) {
                $packages[$k]['courses'] = PackageCourse::where('product_id', $v['id'])->select('*')->get()->toArray();
//                if (!empty($packages)) {
//                    $pas = [];
//                    foreach ($packages as $k => $v) {
//                        $pas[$k] = $v;
//                        //lay thong tin san pham
//                        $pros = PackageCourseProduct::where('package_course_id', $v['id'])->select('product_descr')->get()->toArray();
//                        if (!empty($pros)) {
//                            foreach ($pros as $n => $p) {
//                                $pas[$k]['products'][$n] = $p['product_descr'];
//                            }
//                        }
//                    }
//                    $packages['packages'] = $pas;
//                }
            }
        }
//        echo '<pre>';
//        print_r($packages);
//        exit;
        return view('Frontend::home', [
            'packages' => $packages,
        ]);
    }
}
