<?php


namespace Modules\Admin\Actions\User;


use App\Models\User;
use Illuminate\Http\Request;

class GetUserDetailAction
{
    public function handle(Request $request)
    {

        $query = User::query();
        if ($search = $request->input('search')) {
            $query->where('username', 'like', '%' . $search . '%')
                ->orWhere('full_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
        $query->orderBy('id','DESC');
        return $query->paginate($request->input('perPage',15));
    }
}
