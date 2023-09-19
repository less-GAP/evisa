<?php

namespace Modules\Frontend\Actions\MyAccount;


use App\Models\VisaUser;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PostEditProfileAction
{
    public function handle(Request $request)
    {
        $user = frontend_user();
        $data = $request->only([
            'full_name'
            , 'phone'r
            , 'email'
        ]);
         $user->fill($data)->save();
        Toast::message('Update Information successfully!')
            ->success()
            ->centerTop();
        return redirect('/my-account/edit-profile');
    }
}
