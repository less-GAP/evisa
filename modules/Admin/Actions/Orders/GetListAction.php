<?php


namespace Modules\Admin\Actions\Orders;


use App\Models\Orders;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Orders::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
