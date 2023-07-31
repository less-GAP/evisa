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
        Route::get('list', \Modules\Admin\Actions\User\GetUserListAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\User\PostImageAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\User\PostUserAction::class . '@handle');
        Route::delete('{id}', DeleteUserAction::class . '@handle');
    });

    Route::prefix('/product')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Product\GetProductListAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Product\GetProductDetailAction::class . '@handle');

        Route::post('uploadImage', \Modules\Admin\Actions\Product\PostUploadImageAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Product\PostProductAction::class . '@handle');

        Route::post('activeList', \Modules\Admin\Actions\Product\PostActiveListAction::class . '@handle');

        Route::delete('{id}', \Modules\Admin\Actions\Product\DeleteProductAction::class . '@handle');
    });

    Route::prefix('/video')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Video\GetVideoListAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Video\GetVideoDetailAction::class . '@handle');
        Route::post('uploadVideo', \Modules\Admin\Actions\Video\PostUploadVideoAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Video\PostVideoAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Video\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Video\DeleteVideoAction::class . '@handle');
    });

    Route::prefix('/series')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Series\GetSeriesListAction::class . '@handle');
        Route::get('customer-groups', \Modules\Admin\Actions\Series\GetCustomerGroupsAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Series\GetSeriesDetailAction::class . '@handle');

        Route::post('', \Modules\Admin\Actions\Series\PostSeriesAction::class . '@handle');
//        Route::post('activeList', \Modules\Admin\Actions\Video\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Series\DeleteSeriesAction::class . '@handle');
    });


});
