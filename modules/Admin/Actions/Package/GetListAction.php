<?php


namespace Modules\Admin\Actions\Package;


use App\Models\Product;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Product::where('type', 'package');
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $packages = $query->with('images')->paginate($request->input('perPage', 15));

        return $packages;
    }
}
