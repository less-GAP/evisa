<?php


namespace Modules\Admin\Actions\Package;

use App\Models\PackageCourse;
use App\Models\PackageCourseProduct;
use App\Models\Product;
use App\Models\ProductPackage;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
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
//            if ($request->input('images')) {
//                $syncImages = [];
//                foreach ($request->input('images') as $imageData) {
//                    $syncImages[$imageData['id']] = ['type' => $imageData['type'] ?? 'image'];
//                }
//                $product->images()->sync($syncImages);
//            }
            if ($data['type'] == 'package') {
                if (!empty($data['packages'])) {
                    foreach ($data['packages'] as $v) {
                        $course = [
                            'image' => $v['image'],
                            'name' => $v['name'],
                            'point' => $v['point'],
                            'price' => $v['price'],
                            'short_description' => $v['short_description'],
                            'stock' => $v['stock'],
                            'product_id' => $product->id,
                            'time' => $v['time']
                        ];
                        if (isset($v['id']) && $v['id'] > 0) {
                            $id = $v['id'];
                            PackageCourse::where('id', $id)->update($course);
                        } else {
                            $PackageCourse = PackageCourse::create($course);
                            $id = $PackageCourse->id;
                        }

                        if ($id > 0 && !empty($v['packages'])) {
                            PackageCourseProduct::where('package_course_id', $id)->delete();
                            foreach ($v['packages'] as $pa) {
                                PackageCourseProduct::create([
                                    'package_course_id' => $id,
                                    'product_id' => $pa['id'],
                                    'product_descr' => $pa
                                ]);
                            }
                        }
                    }
                }
            }

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
