<?php

namespace Lessgap\Events;

class EventManager
{
    private $registerEvents = [];

    public function registerEvent($eventName, $handler)
    {
        if (!isset($this->registerEvents[$eventName])) {
            $this->registerEvents[$eventName] = [];
        }
        $this->registerEvents[$eventName][] = $handler;
    }

    public function executeEvent($eventName, $data)
    {
        if (isset($this->registerEvents[$eventName])) {
            foreach ($this->registerEvents[$eventName] as $eventHandler) {
                app()->call($eventHandler, $data);
            }
        }
    }
}
