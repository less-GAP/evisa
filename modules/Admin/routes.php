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

    Route::prefix('/auth')->group(function () {
        Route::get('userInfo', GetUserInfoAction::class . '@handle');

    });
    Route::prefix('/user')->group(function () {
        Route::delete('{id}', DeleteUserAction::class . '@handle');
        Route::get('list', \Modules\Admin\Actions\User\GetUserListAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\User\PostImageAction::class . '@handle');
    });
    Route::prefix('/product')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Product\GetProductListAction::class . '@handle');
        Route::post('uploadImage', \Modules\Admin\Actions\Product\PostUploadImageAction::class . '@handle');
    });


});
