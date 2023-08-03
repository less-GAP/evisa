<?php


namespace Modules\Admin\Actions\Districts;


use App\Models\Districts;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $district = [];
        $id = $request->route('id');
        if ($id > 0) {
            $district = Districts::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $district
        ];
    }
}
