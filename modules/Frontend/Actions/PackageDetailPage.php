<?php

namespace Modules\Frontend\Actions;


use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class PackageDetailPage
{
    public function handle(Request $request)
    {

        $slug = $request->route('slug');

        $package = Product::where('slug', $slug)->first()->toArray();
        if (!empty($package)) {
            $courses = PackageCourse::where('product_id', $package['id'])->select('*')->get()->toArray();
            if (!empty($courses)) {
                foreach ($courses as $k => $v) {
                    $pros = PackageCourseProduct::where('package_course_id', $v['id'])->select('*')->get()->toArray();
                    if (!empty($pros)) {
                        foreach ($pros as $n => $p) {
                            $courses[$k]['products'][$n] = $p['product_detail'];
                        }
                    }
                }
            }
            $package['courses'] = $courses;
            $other_packages = [];

            $others = Product::where('id', '<>', $package['id'])->select('*')->get()->toArray();
            if (!empty($others)) {
                foreach ($others as $ot) {
                    $courses = PackageCourse::where('product_id', $ot['id'])->select('*')->get()->toArray();
                    if (!empty($courses)) {
                        foreach ($courses as $k => $v) {
                            $v['package_name'] = $ot['name'];
                            $v['slug'] = $ot['slug'];
                            $other_packages[] = $v;
                        }
                    }
                }
            }
        }


        return view('Frontend::package_detail', [
            'package' => $package,
            'other_packages' => $other_packages
        ]);
    }
}
