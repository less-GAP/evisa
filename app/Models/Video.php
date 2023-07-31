<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'videos';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'path',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
//        'password',
//        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];

    protected $appends = [
        'path_full'
    ];

    public function getPathFullAttribute()
    {
        if ($this->path != '') {
            return url('upload/' . $this->path, '', env('APP_ENV') == 'local' ? false : true);
        }
        return '';
    }
}
