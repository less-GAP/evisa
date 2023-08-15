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
        'id',
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
        'order_status'
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
        'shipping_name',
        'payment_name',
        'country_name',
        'province_name',
        'district_name',
        'ward_name',
    ];

    public function getShippingNameAttribute()
    {
        if ($this->shipping_id != '') {
            $data = ShippingMethod::where('id', $this->shipping_id)->first();
            return $data->name;
        }
        return '';
    }

    public function getPaymentNameAttribute()
    {
        if ($this->payment_id != '') {
            $data = PaymentMethod::where('id', $this->payment_id)->first();
            return $data->name;
        }
        return '';
    }

    public function getCountryNameAttribute()
    {
        if ($this->s_country != '') {
            $data = Countries::where('code', $this->s_country)->first();
            return $data->name;
        }
        return '';
    }

    public function getProvinceNameAttribute()
    {
        if ($this->s_province != '' && $this->s_country != '') {
            $data = Provinces::where('code', $this->s_province)
                ->where('country_code', $this->s_country)
                ->first();
            return $data->name;
        }
        return '';
    }

    public function getDistrictNameAttribute()
    {
        if ($this->s_province != '' && $this->s_country != '' && $this->s_district != '') {
            $data = Districts::where('code', $this->s_district)
                ->where('province_code', $this->s_province)
                ->where('country_code', $this->s_country)
                ->first();
            return $data->name;
        }
        return '';
    }

    public function getWardNameAttribute()
    {
        if ($this->s_province != '' && $this->s_country != '' && $this->s_district != '' && $this->s_ward != '') {
            $data = Wards::where('code', $this->s_ward)
                ->where('province_code', $this->s_province)
                ->where('country_code', $this->s_country)
                ->where('district_code', $this->s_district)
                ->first();
            return $data->name;
        }
        return '';
    }


}
