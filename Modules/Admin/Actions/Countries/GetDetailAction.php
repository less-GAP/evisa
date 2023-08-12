<?php


namespace Modules\Admin\Actions\Countries;


use App\Models\Countries;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $country = [];
        $id = $request->route('id');
        if ($id > 0) {
            $country = Countries::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $country
        ];
    }
}
