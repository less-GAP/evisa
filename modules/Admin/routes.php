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

        Route::get('list', \Modules\Admin\Actions\Video\GetListAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Video\GetDetailAction::class . '@handle');
        Route::post('uploadVideo', \Modules\Admin\Actions\Video\PostUploadVideoAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Video\PostAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Video\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Video\DeleteAction::class . '@handle');
    });

    Route::prefix('/series')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Series\GetSeriesListAction::class . '@handle');
        Route::get('customer-groups', \Modules\Admin\Actions\Series\GetCustomerGroupsAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Series\GetSeriesDetailAction::class . '@handle');

        Route::post('', \Modules\Admin\Actions\Series\PostSeriesAction::class . '@handle');
//        Route::post('activeList', \Modules\Admin\Actions\Video\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Series\DeleteSeriesAction::class . '@handle');
    });

    Route::prefix('/customer')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Customer\GetListAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Customer\PostActiveListAction::class . '@handle');
    });

    Route::prefix('/customer-group')->group(function () {
        Route::get('list', \Modules\Admin\Actions\CustomerGroup\GetListAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\CustomerGroup\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\CustomerGroup\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\CustomerGroup\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\CustomerGroup\DeleteAction::class . '@handle');
    });

    Route::prefix('/countries')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Countries\GetListAction::class . '@handle');
        Route::get('all', \Modules\Admin\Actions\Countries\GetAllAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Countries\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Countries\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Countries\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Countries\DeleteAction::class . '@handle');
    });

    Route::prefix('/provinces')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Provinces\GetListAction::class . '@handle');
        Route::get('all', \Modules\Admin\Actions\Provinces\GetAllAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Provinces\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Provinces\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Provinces\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Provinces\DeleteAction::class . '@handle');
    });

    Route::prefix('/districts')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Districts\GetListAction::class . '@handle');
        Route::get('all', \Modules\Admin\Actions\Districts\GetAllAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Districts\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Districts\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Districts\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Districts\DeleteAction::class . '@handle');
    });


    Route::prefix('/wards')->group(function () {
        Route::get('list', \Modules\Admin\Actions\Wards\GetListAction::class . '@handle');
        Route::post('', \Modules\Admin\Actions\Wards\PostAction::class . '@handle');
        Route::get('{id}', \Modules\Admin\Actions\Wards\GetDetailAction::class . '@handle');
        Route::post('activeList', \Modules\Admin\Actions\Wards\PostActiveListAction::class . '@handle');
        Route::delete('{id}', \Modules\Admin\Actions\Wards\DeleteAction::class . '@handle');
    });


});
