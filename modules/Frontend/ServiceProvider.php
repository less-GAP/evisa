<?php

namespace Modules\Frontend;


use App\Providers\AbstractModuleProvider;

class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = '/';


}
