<?php

namespace Lessgap\Traits;

use App\Models\User;
use Lessgap\Events\NotificationEventHandler;
use Lessgap\Jobs\ExecuteModelEvent;
use Lessgap\Notifications\NotificationData;

trait HasLessgapEvent
{
    public static function bootHasLessgapEvent()
    {

        static::created(function ($model) {
            dispatch(new ExecuteModelEvent($model->getTable() . '.created', $model));
        });

        static::updated(function ($model) {
            dispatch(new ExecuteModelEvent($model->getTable() . '.updated', $model));
        });


    }


    public function notificationData()
    {
        return new NotificationData($this);
    }

}
