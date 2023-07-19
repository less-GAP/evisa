<?php

namespace Modules\Admin;


use App\Providers\AbstractModuleProvider;

class ServiceProvider extends AbstractModuleProvider
{
    protected $middleware = [];
    protected $routePrefix = 'admin/api';


}
