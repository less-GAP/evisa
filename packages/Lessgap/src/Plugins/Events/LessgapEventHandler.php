<?php


namespace Lessgap\Plugins\Events;

use Lessgap\Models\EventSetting;

class LessgapEventHandler
{
    public static function handle($eventName, $model)
    {
        $eventSettings = EventSetting::where('event_name', $eventName)->get();
        foreach ($eventSettings as $eventSetting) {
            foreach ($eventSetting->handlers as $notificationType) {
                try {
                    if ($config = (config('lessgap.event_handler.' . $notificationType))) {
                        $config['handler']::handle($eventSetting, $config, $model);
                    }
                } catch (\Throwable $e) {
                    \Log::error($e);
                }
            }
        }
    }


    /**
     * Get the voice representation of the notification.
     */
    public function toArray(object $notifiable)
    {
        return $notifiable->toArray();
    }

}
