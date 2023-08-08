<?php


namespace Modules\Admin\Actions\Series;


use App\Models\Series;
use Illuminate\Http\Request;

class GetSeriesListAction
{
    public function handle(Request $request)
    {

        $query = Series::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $query->orderBy('id','DESC');
        $items = $query->paginate($request->input('perPage',15));
        return $items;
    }
}
