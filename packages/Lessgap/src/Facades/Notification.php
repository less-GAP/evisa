<?php


namespace Lessgap\Facades;


use Illuminate\Support\Facades\Facade;
use Lessgap\Notifications\LessgapNotification;

class Notification extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return  string
     */
    protected static function getFacadeAccessor() { return LessgapNotification::class; }
}
