<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Actions\GetUserInfoAction;
use Modules\Admin\Actions\User\DeleteUserAction;
use Modules\Admin\Middleware\AdminIsAuthenticated;

Route::get('/', function () {
    return 'admin api';
});
Route::post('auth/login', \Modules\Admin\Actions\Auth\PostLoginAction::class . '@handle');

Route::middleware([AdminIsAuthenticated::class])->group(function () {
    Route::get('/auth', function () {
        return 'admin authed';
    });
    Route::get('auth/userInfo', GetUserInfoAction::class . '@handle');
    Route::delete('user/{id}', DeleteUserAction::class . '@handle');
    Route::get('user/list', \Modules\Admin\Actions\User\GetUserListAction::class . '@handle');
    Route::post('user/activeList', \Modules\Admin\Actions\User\PostImageAction::class . '@handle');


    Route::get('product/list', \Modules\Admin\Actions\Product\GetProductListAction::class . '@handle');
    Route::post('product/uploadImage', \Modules\Admin\Actions\Product\PostUploadImageAction::class . '@handle');

});
