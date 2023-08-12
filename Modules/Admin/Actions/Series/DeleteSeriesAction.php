<?php


namespace Modules\Admin\Actions\Series;


use App\Models\Series;
use App\Models\SeriesVideo;
use Illuminate\Http\Request;

class DeleteSeriesAction
{
    public function handle(Request $request)
    {
        try {
            $query = Series::query();
            $seri = $query->where('id', $request->route('id'))->first();
            if (!empty($seri)) {
                Series::where('id', $seri->id)->delete();
                SeriesVideo::where('series_id', $seri->id)->delete();
            }
            $output = [
                'code' => 1,
                'message' => 'Thành công !',
                'data' => $request->route('id')
            ];
        } catch (\Throwable $e) {
            $output = [
                'code' => 0,
                'message' => 'Thất bại ! ' . $e->getMessage(),
                'data' => $request->route('id')
            ];
        }

        return $output;
    }
}
