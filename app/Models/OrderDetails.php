<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'order_details';

    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'package_course_id',
        'price',
        'amount',
        'extra',
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
        'extra' => 'array',
    ];

    protected $appends = [
        'product',
//        'videos'
    ];

    public function getProductAttribute()
    {
        $pro = Product::where('id', $this->product_id)->first();
        return $pro->name;
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
