<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesVideo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'series_video';

    public $timestamps = false;

    protected $fillable = [
        'series_id',
        'video_id',
        'video_descr',
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
        'video_descr' => 'array',
    ];

    protected $appends = [
        //'image_url'
    ];

//    public function getImageUrlAttribute()
//    {
//        if ($this->image != '') {
//            return url('upload/' . $this->image, '', env('APP_ENV') == 'local' ? false : true);
//        }
//        return '';
//    }
}
