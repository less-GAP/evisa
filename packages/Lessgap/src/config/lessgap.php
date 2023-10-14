<?php

use Lessgap\Plugins\Events\LessgapNotificationHandler;

return [
    'event_handler' => [
        'notification_message' => [
            'handler' => LessgapNotificationHandler::class,
            'channels' => ['database',\Lessgap\Plugins\Events\Channels\RealtimeChannel::class]
        ],
    ],

];
