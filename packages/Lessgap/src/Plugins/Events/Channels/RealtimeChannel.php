<?php


namespace Lessgap\Plugins\Events\Channels;

use Illuminate\Notifications\Notification;
use Lessgap\Services\RealtimeService;

class RealtimeChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        app(RealtimeService::class)->updateVersion('notification', $notifiable->username);

    }
}
