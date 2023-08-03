<?php


namespace Modules\Admin\Actions;


class GetUserInfoAction
{
    public function handle(){
        return \Auth::guard('admin')->user();
    }
}
