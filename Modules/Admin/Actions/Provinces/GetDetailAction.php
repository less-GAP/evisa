<?php


namespace Modules\Admin\Actions\Provinces;


use App\Models\Provinces;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $province = [];
        $id = $request->route('id');
        if ($id > 0) {
            $province = Provinces::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $province
        ];
    }
}
