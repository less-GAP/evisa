<?php


namespace Modules\Admin\Actions\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;

class PostActiveListAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        try {
            $res = Customer::whereIn('id', $data['items'])->update([
                'status' => $data['status']
            ]);

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => []
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
