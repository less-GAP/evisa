<?php


namespace Modules\Admin\Actions\Series;


use App\Models\CustomerGroups;
use App\Models\Series;
use Illuminate\Http\Request;

class GetCustomerGroupsAction
{
    public function handle(Request $request)
    {

        $query = CustomerGroups::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $query->orderBy('id', 'ASC');
        return $query->get();
    }
}
