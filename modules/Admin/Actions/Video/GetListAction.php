<?php


namespace Modules\Admin\Actions\Video;


use App\Models\Video;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {

        $query = Video::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $query->orderBy('id','DESC');
        return $query->paginate($request->input('perPage',15));
    }
}
