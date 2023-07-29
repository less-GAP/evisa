<?php


namespace Modules\Admin\Actions\User;


use App\Models\User;
use Illuminate\Http\Request;
use Modules\Admin\Requests\CreateUserRequest;

class PostUserAction
{
    public function handle(CreateUserRequest $request)
    {
        $data = $request->all();
        if(!empty($data['password'])){
            $data['password'] = \Hash::make( $data['password']);
        }
       $result = User::create($data);
        return $result;
    }
}
