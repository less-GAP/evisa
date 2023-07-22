<?php

namespace Modules\Admin;


use App\Providers\AbstractModuleProvider;

define('ADMIN_API_ROUTE',env('APP_ADMIN').'/api');
class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = ADMIN_API_ROUTE;


}
