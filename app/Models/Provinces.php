<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'provinces';

    public $timestamps = true;

    protected $fillable = [
        'code',
        'name',
        'country_code',
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
        'country_name',
//        'videos'
    ];

    public function getCountryNameAttribute()
    {
        $cus = Countries::where('code', $this->country_code)->first();
        return $cus->name;
    }
//
//    public function getVideosAttribute()
//    {
//        $vi = [];
//        $videos = SeriesVideo::where('series_id', $this->id)->get();
//        if(!empty($videos)){
//            foreach($videos as $v){
//                $vi[] = $v->video_descr;
//            }
//        }
//        return $vi;
//    }
}
