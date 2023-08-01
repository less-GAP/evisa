<?php


namespace Modules\Admin\Actions\Districts;

use App\Models\Districts;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $district = new Districts();
            if (isset($data['id']) && $data['id'] > 0) {
                $district = Districts::find($data['id']);
            }

            $district->fill($data);
            $district->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $district
            ];
        } catch (\Throwable $e) {
            $output = [
                'code' => 0,
                'message' => $e->getMessage(),
                'data' => []
            ];
        }
        return $output;
    }
}
