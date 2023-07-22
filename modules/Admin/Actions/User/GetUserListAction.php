<?php


namespace Modules\Admin\Actions\User;


use App\Models\User;
use Illuminate\Http\Request;

class GetUserListAction
{
    public function handle(Request $request){

        return User::query()->paginate(15);
    }
}
