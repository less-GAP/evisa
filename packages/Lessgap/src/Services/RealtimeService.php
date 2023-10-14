<?php


namespace Lessgap\Services;


class RealtimeService
{
    private $connection;

    public function __construct()
    {
        $this->connection = \DB::connection('realtime');
    }

    public function updateTableValue($table, $key, $user = null, $value = null)
    {
        $exits = $this->connection->table($table)->where('key', $key)->where('user', $user)->first();
        if ($exits) {
            $this->connection->statement('UPDATE ' . $exits['id'] . ' SET value = \'' . ($value ?? uniqid()) . '\'');
        } else {
            $this->connection->statement('CREATE ' . $table . ' CONTENT {
    key: \'' . $key . '\',
    user: \'' . $user . '\',
    value: \'' . ($value ?? uniqid()) . '\',
}');
        }
    }
    public function updateVersion($key, $user = null, $value = null)
    {
        $table = 'versions';
        $exits = $this->connection->table($table)->where('key', $key)->where('user', $user)->first();
        if ($exits) {
            $this->connection->statement('UPDATE ' . $exits['id'] . ' SET value = \'' . ($value ?? uniqid()) . '\'');
        } else {
            $this->connection->statement('CREATE '.$table.' CONTENT {
    key: \'' . $key . '\',
    user: \'' . $user . '\',
    value: \'' . ($value ?? uniqid()) . '\',
}');
        }
    }

}
