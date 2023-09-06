<?php

namespace Modules\Frontend;


use App\Providers\AbstractModuleProvider;
use ProtoneMedia\Splade\Facades\Splade;

class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = '/';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Splade::setRootView('Frontend::root');
        Splade::defaultToast(function ($toast) {
            $toast->info()->centerTop()->autoDismiss(5);
        });
    }
}
