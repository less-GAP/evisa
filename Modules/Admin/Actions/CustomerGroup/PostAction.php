<?php


namespace Modules\Admin\Actions\CustomerGroup;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Modules\Admin\Middleware\AdminIsAuthenticated;

class PostAction
{
    public function handle(Request $request)
    {
        $data = $request->all();
        try {
            $customerGroup = new CustomerGroup();
            if (isset($data['id']) && $data['id'] > 0) {
                $customerGroup = CustomerGroup::find($data['id']);
            }

            $customerGroup->fill($data);
            $customerGroup->save();

            $output = [
                'code' => 1,
                'message' => 'Thành công!',
                'data' => $customerGroup
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
