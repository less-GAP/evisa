<?php


namespace Lessgap\Traits;


use App\Models\User;

trait HasLessgapNotification
{
    public function admins(){
        return User::whereHas('roles.permissions')->get();
    }


}
