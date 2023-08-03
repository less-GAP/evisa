<?php


namespace Modules\Admin\Actions\Wards;


use App\Models\Wards;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = Wards::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%');
        }
        return $query->paginate($request->input('perPage', 15));
    }
}
