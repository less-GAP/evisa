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
use Modules\Frontend\Middleware\FrontendIsAuthenticated;

Route::middleware(['splade'])->group(function () {
    Route::get('/', HomeAction::class . '@handle')->name('home');
    Route::get('/product/{slug}', PackageDetailPage::class . '@handle')->name('product');
    //Route::get('/registration/{ref_code}', RegistrationFormAction::class . '@handle')->name('registration');
    Route::get('/registration', RegistrationFormAction::class . '@handle')->name('registration');

    Route::post('/registration', RegistrationFormAction::class . '@register')->name('register');

    Route::get('/login', LoginAction::class . '@handle')->name('login.get');

    Route::post('/login', LoginAction::class . '@login')->name('login.post');

    Route::get('/docs', fn() => view('docs'))->name('docs');

    Route::middleware([FrontendIsAuthenticated::class])->group(function () {

        Route::get('/profile', ProfileAction::class . '@handle')->name('profile');

        Route::post('/profile', ProfileAction::class . '@update')->name('profile.update');

        Route::get('profile/product', ProductAction::class . '@handle')->name('profile.product');

        Route::get('profile/cart', CartAction::class . '@handle')->name('profile.cart');

    });


    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

});
