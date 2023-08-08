<?php


namespace Modules\Admin\Actions\PaymentMethod;


use App\Models\PaymentMethod;
use App\Providers\AbstractModuleProvider;
use Illuminate\Http\Request;

class GetDetailAction
{
    public function handle(Request $request)
    {
        $payment_method = [];
        $id = $request->route('id');
        if ($id > 0) {
            $payment_method = PaymentMethod::where('id', $id)->first();
        }
        return [
            'code' => 1,
            'message' => 'Thành công !',
            'data' => $payment_method
        ];
    }
}
