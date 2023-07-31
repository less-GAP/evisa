<?php


namespace Modules\Admin\Actions\CustomerGroup;


use App\Models\CustomerGroup;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $customerGroup = [];
        $id = $request->route('id');
        if ($id > 0) {
            $customerGroup = CustomerGroup::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $customerGroup
        ];
    }
}
