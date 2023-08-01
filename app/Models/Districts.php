<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'districts';

    public $timestamps = true;

    protected $fillable = [
        'code',
        'name',
        'country_code',
        'province_code',
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
        'province_name',
    ];

    public function getCountryNameAttribute()
    {
        $cus = Countries::where('code', $this->country_code)->first();
        return $cus->name;
    }

    public function getProvinceNameAttribute()
    {
        $cus = Provinces::where('code', $this->province_code)->first();
        return $cus->name;
    }
}
