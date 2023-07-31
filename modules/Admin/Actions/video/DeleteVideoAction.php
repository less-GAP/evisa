<?php


namespace Modules\Admin\Actions\Video;


use App\Models\Video;
use Illuminate\Http\Request;

class DeleteVideoAction
{
    public function handle(Request $request)
    {
        try {
            $query = Video::query();
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
