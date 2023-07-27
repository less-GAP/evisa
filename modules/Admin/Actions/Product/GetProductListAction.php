<?php


namespace Modules\Admin\Actions\Product;


use App\Models\Product;
use Illuminate\Http\Request;

class GetProductListAction
{
    public function handle(Request $request)
    {
        $query = Product::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
