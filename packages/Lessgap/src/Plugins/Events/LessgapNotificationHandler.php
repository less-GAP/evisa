<?php


namespace Lessgap\Plugins\Events;


use Lessgap\Models\EventSetting;

class LessgapNotificationHandler
{
    public static function handle(EventSetting $eventSetting, $config, $model)
    {
        foreach ($model->notifiables($eventSetting['data']['notification_to']) as $notifiable) {
            $notifiable->notify(new LessgapNotification($eventSetting, $config['channels'], $model));
        }

    }

}
