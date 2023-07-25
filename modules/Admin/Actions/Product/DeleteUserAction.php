<?php


namespace Modules\Admin\Actions\User;


use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserAction
{
    public function handle(Request $request)
    {

        $query = User::query();
        return $query->find($request->route('id'))->delete();
    }
}
