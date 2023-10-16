<?php

namespace Lessgap;

use Illuminate\Support\ServiceProvider;
use Lessgap\Events\EventManager;
use Lessgap\Events\NotificationEventHandler;
use Lessgap\Notifications\LessgapNotification;
use Illuminate\Contracts\Foundation\Application;
use Lessgap\Services\EmailService;
use Lessgap\Services\RealtimeService;

class LessgapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->singleton(EventManager::class, function (Application $app) {
            return new EventManager();
        });
        $this->app->singleton(EmailService::class, function (Application $app) {
            return new EmailService();
        });
        $this->app->singleton(RealtimeService::class, function (Application $app) {
            return new RealtimeService();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        require __DIR__."/Helper.php";

    }
}
