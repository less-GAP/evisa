<?php


namespace Modules\Admin\Actions\Series;

use App\Models\Series;
use App\Models\SeriesVideo;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostSeriesAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $seri = new Series();
            if (isset($data['id']) && $data['id'] > 0) {
                $seri = Series::find($data['id']);
            }

            $seri->fill($data);
            $seri->save();

            if (isset($data['id']) && $data['id'] > 0) {
                SeriesVideo::where('series_id', $data['id'])->delete();
            }
            if (!empty($data['videos'])) {
                foreach ($data['videos'] as $v) {
                    $pa = [
                        'series_id' => $seri->id,
                        'video_id' => $v['id'],
                        'video_descr' => $v
                    ];
                    SeriesVideo::create($pa);
                }
            }

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $seri
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
