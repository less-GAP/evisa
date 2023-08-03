<?php


namespace Modules\Admin\Actions\PaymentMethod;


use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = PaymentMethod::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
