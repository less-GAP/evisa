<?php


namespace Modules\Admin\Actions\Series;


use App\Models\Series;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetSeriesDetailAction
{
    public function handle(Request $request)
    {
        $seri = [];
        $id = $request->route('id');
        if ($id > 0) {
            $seri = Series::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $seri
        ];
    }
}
