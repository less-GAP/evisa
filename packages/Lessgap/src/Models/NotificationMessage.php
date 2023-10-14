<?php


namespace Lessgap\Models;


use Illuminate\Database\Eloquent\Model;

class NotificationMessage extends Model
{
    protected $connection = 'realtime';
    protected $table = 'notifications';
    public $fillable = [
        'event_name'
        , 'username'
        , 'title'
        , 'by_user'
        , 'status'
        , 'message'
        , 'data'
    ];
    protected $casts = [
    ];
}
