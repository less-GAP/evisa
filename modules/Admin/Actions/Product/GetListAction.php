<?php


namespace Modules\Admin\Actions\Product;


use App\Models\Product;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Product::where('type','product');
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->with('images')->paginate($request->input('perPage', 15));
    }
}
