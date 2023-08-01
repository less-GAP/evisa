<?php


namespace Modules\Admin\Actions\Countries;


use App\Models\Countries;
use Illuminate\Http\Request;

class DeleteAction
{
    public function handle(Request $request)
    {
        try {
            $query = Countries::query();
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
