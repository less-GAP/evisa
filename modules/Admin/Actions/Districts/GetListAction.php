<?php


namespace Modules\Admin\Actions\Districts;


use App\Models\Districts;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Districts::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
