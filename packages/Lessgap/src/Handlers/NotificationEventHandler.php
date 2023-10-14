<?php


namespace Lessgap\Handlers;


use Lessgap\Models\EventSetting;

class NotificationEventHandler
{

    public function handle($eventName, $model)
    {
        $eventSettings = EventSetting::where('event_name', $eventName)->get();
        foreach ($eventSettings as $eventSetting) {
            foreach ($eventSetting->data['notifications'] as $notificationType) {
                try {
                    \Log::info(config('lessgap.notification_handler.' . $notificationType));
                    if ($handler = (config('lessgap.notification_handler.' . $notificationType))) {
                        if (class_exists($handler)) {
                            app($handler)->handle($eventSetting, $model);
                        }
                    }
                } catch (\Throwable $e) {
                    \Log::error($e);
                }
            }
        }

    }
}
