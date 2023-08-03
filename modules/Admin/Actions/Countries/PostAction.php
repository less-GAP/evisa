<?php


namespace Modules\Admin\Actions\Countries;

use App\Models\Countries;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();

        try {
            $countries = new Countries();
            if (isset($data['id']) && $data['id'] > 0) {
                $countries = Countries::find($data['id']);
            }

            $countries->fill($data);
            $countries->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $countries
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
