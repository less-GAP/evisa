<?php


namespace Lessgap\Handlers;


class LessgapNotificationHandler
{

    public function __construct(private $connection)
    {
    }

    public function handle($message)
    {
        echo $message;
    }

}
