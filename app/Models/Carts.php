<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'carts';

    public $timestamps = true;

    protected $fillable = [
        'customer_id',
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
//        'password' => 'hashed',
    ];

    protected $appends = [
        'product',
        'package_course'
    ];


    public function getProductAttribute()
    {
        if ($this->product_id != '') {
            $data = Product::where('id', $this->product_id)->first();
            return $data->name;
        }
        return '';
    }

    public function getPackageCourseAttribute()
    {
        if ($this->package_course_id != '') {
            return PackageCourse::where('id', $this->package_course_id)->first()->toArray();
        }
        return [];

    }
//
//    public function getCountryNameAttribute()
//    {
//        $data = Countries::where('code', $this->s_country)->first();
//        return $data->name;
//    }
//
//    public function getProvinceNameAttribute()
//    {
//        $data = Provinces::where('code', $this->s_province)
//            ->where('country_code', $this->s_country)
//            ->first();
//        return $data->name;
//    }
//
//    public function getDistrictNameAttribute()
//    {
//        $data = Districts::where('code', $this->s_district)
//            ->where('province_code', $this->s_province)
//            ->where('country_code', $this->s_country)
//            ->first();
//        return $data->name;
//    }
//
//    public function getWardNameAttribute()
//    {
//        $data = Wards::where('code', $this->s_ward)
//            ->where('province_code', $this->s_province)
//            ->where('country_code', $this->s_country)
//            ->where('district_code', $this->s_district)
//            ->first();
//        return $data->name;
//    }


}
