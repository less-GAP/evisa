<?php


namespace Modules\Admin\Actions\Wards;


use App\Models\Wards;
use Illuminate\Http\Request;

class DeleteAction
{
    public function handle(Request $request)
    {
        try {
            $query = Wards::query();
            $del = $query->find($request->route('id'))->delete();
            $output = [
                'code' => 1,
                'message' => 'Thành công !',
                'data' => $del
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
