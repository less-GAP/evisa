<?php


namespace Modules\Admin\Actions\Provinces;

use App\Models\Provinces;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $province = new Provinces();
            if (isset($data['id']) && $data['id'] > 0) {
                $province = Provinces::find($data['id']);
            }

            $province->fill($data);
            $province->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $province
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
