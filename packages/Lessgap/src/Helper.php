<?php

global $eventManager;
$eventManager = new Lessgap\Events\EventManager;

function lessgap_register_event_handler($eventName, $handler)
{
    global $eventManager;
    $eventManager->registerEvent($eventName, $handler);
}

function lessgap_handle_event($eventName, $data)
{
    global $eventManager;
    $eventManager->executeEvent($eventName, $data);
}
