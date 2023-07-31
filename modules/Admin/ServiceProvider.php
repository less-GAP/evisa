<?php

namespace Modules\Admin;


use App\Providers\AbstractModuleProvider;

define('ADMIN_ROUTE_PREFIX', env('APP_ADMIN') . '/api');
class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = ADMIN_ROUTE_PREFIX;

}
