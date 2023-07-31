<?php


namespace Modules\Admin\Actions\Video;

use App\Models\Product;
use App\Models\ProductPackage;
use App\Models\Video;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $video = new Video();
            if (isset($data['id']) && $data['id'] > 0) {
                $video = Video::find($data['id']);
            }

            if (!isset($data['slug']) || $data['slug'] == '') {
                $data['slug'] = \Str::slug($data['name']);
            }

            $video->fill($data);
            $video->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $video
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
