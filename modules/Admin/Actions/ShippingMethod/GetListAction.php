<?php


namespace Modules\Admin\Actions\ShippingMethod;


use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = ShippingMethod::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
