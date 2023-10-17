<?php


namespace Modules\Admin\Actions\SMS;


use App\Models\SmsHistory;
use Illuminate\Http\Request;

class GetListAction
{
    public function handle(Request $request)
    {
        $query = SmsHistory::query();
        if ($search = $request->input('filter')) {
            $query->where('content', 'like', '%'.$search['search'].'%');
        }

        if ($request->input('phone')) {
            $query->where('phone', $request->input('phone'));
        }

        if ($by = $request->input('orderby') ?? 'id') {
            $query->orderBy($by, 'DESC');
        }

        return $query->paginate($request->input('perPage',20));
    }
}
