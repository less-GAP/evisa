<?php


namespace Modules\Frontend\Actions\Auth;


use App\Models\VisaUser;
use Modules\Frontend\Requests\SignupRequest;

class PostLoginAction
{
    public function handle(SignupRequest $request)
    {

        return redirect('profile');
    }
}
