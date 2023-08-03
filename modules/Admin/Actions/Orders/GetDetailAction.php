<?php


namespace Modules\Admin\Actions\Wards;


use App\Models\Wards;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $ward = [];
        $id = $request->route('id');
        if ($id > 0) {
            $ward = Wards::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $ward
        ];
    }
}
