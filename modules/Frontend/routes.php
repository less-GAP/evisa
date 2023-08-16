<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Actions\PackageDetailPage;
use Modules\Frontend\Actions\TestFormAction;
use Modules\Frontend\Actions\HomeAction;
use Modules\Frontend\Actions\RegistrationFormAction;
use Modules\Frontend\Actions\LoginAction;
use Modules\Frontend\Actions\ProfileAction;
use Modules\Frontend\Actions\ProductAction;
use Modules\Frontend\Actions\CartAction;
use Modules\Frontend\Actions\OrderAction;
use Modules\Frontend\Actions\LocationAction;
use Modules\Frontend\Middleware\FrontendIsAuthenticated;

Route::middleware(['splade'])->group(function () {
    Route::get('/', HomeAction::class . '@handle')->name('home');
    Route::get('/product/{slug}', PackageDetailPage::class . '@handle')->name('product');
    Route::get('/registration/{ref_code}', RegistrationFormAction::class . '@handle')->name('registration');
    //Route::get('/registration', RegistrationFormAction::class . '@handle')->name('registration');

    Route::post('/registration', RegistrationFormAction::class . '@register')->name('register');

    Route::get('/login', LoginAction::class . '@handle')->name('login.get');

    Route::post('/login', LoginAction::class . '@login')->name('login.post');

    Route::get('/docs', fn() => view('docs'))->name('docs');

    Route::middleware([FrontendIsAuthenticated::class])->group(function () {

        Route::get('/profile', ProfileAction::class . '@handle')->name('profile');

        Route::post('/profile', ProfileAction::class . '@update')->name('profile.update');

        Route::get('profile/product', ProductAction::class . '@handle')->name('profile.product');

        Route::get('profile/logout', ProfileAction::class . '@logout')->name('profile.logout');

        Route::get('profile/product/{id}', ProductAction::class . '@detail')->name('profile.product.detail');

        Route::get('profile/cart', CartAction::class . '@handle')->name('profile.cart');

        Route::post('profile/cart', CartAction::class . '@update')->name('profile.product.cart');

        Route::post('profile/update-cart', CartAction::class . '@updateCart')->name('profile.update.cart');

        Route::get('profile/checkout', CartAction::class . '@checkout')->name('profile.checkout');

        Route::post('profile/checkout', CartAction::class . '@checkout')->name('profile.checkout.update');

        Route::post('profile/checkout-done', CartAction::class . '@doneCheckout')->name('profile.checkout.done');

        Route::get('profile/cart/{product_id}/{package_course_id}', CartAction::class . '@delete')->name('profile.product.delete-cart');

        Route::get('profile/checkout-complete/{order_id?}', CartAction::class . '@checkoutComplete')->name('profile.checkout.complete');

        Route::get('profile/order', OrderAction::class . '@index')->name('profile.order');
        Route::get('profile/order-detail/{order_id}', OrderAction::class . '@detail')->name('profile.order-detail');

    });

    Route::get('provinces', LocationAction::class . '@provinces')->name('provinces');
    Route::get('districts/{code?}', LocationAction::class . '@districts')->name('districts');
    Route::get('wards/{code?}', LocationAction::class . '@wards')->name('wards');


    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

});
