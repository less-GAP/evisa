<?php


namespace Lessgap\Plugins\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Lessgap\Models\EventSetting;
use Lessgap\Plugins\Events\Channels\RealtimeChannel;

class LessgapNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private $eventSetting, private $channels, private $model)
    {

    }

    /**
     * Get the notification channels.
     */
    public function via(object $notifiable)
    {
        return $this->channels;
    }

    /**
     * Get the voice representation of the notification.
     */
    public function toArray(object $notifiable)
    {
        $title = \Blade::render($this->eventSetting['data']['notification_tittle'] ?? 'Title', $this->model->notificationData());
        $message = \Blade::render($this->eventSetting['data']['notification_message'] ?? 'Message', $this->model->notificationData());
        return array_merge([
            'event_name' => $this->eventSetting->event_name,
            'model_class' => get_class($this->model),
            'model' => $this->model->toArray(),
            'title' => $title,
            'message' => $message,
            'username' => $notifiable->username,
            'status' => 'unread',
        ], method_exists($this->model,'notificationData')?$this->model->notificationData():$this->model->toArray());
    }


}
