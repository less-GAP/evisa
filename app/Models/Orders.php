<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'subtotal',
        'discount',
        'total',
        'subtotal_discount',
        'shipping_id',
        'shipping_cost',
        'shipping_status',
        'payment_id',
        'payment_status',
        'notes',
        'coupon_code',
        's_name',
        's_phone',
        's_address',
        's_ward',
        's_district',
        's_province',
        's_country',
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
//        'customer_group_name',
//        'videos'
    ];

//    public function getCustomerGroupNameAttribute()
//    {
//        $cus = CustomerGroup::where('id', $this->customer_group)->first();
//        return $cus->name;
//    }
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
