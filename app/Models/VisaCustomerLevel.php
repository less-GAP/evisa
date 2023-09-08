<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaCustomerLevel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, CreatedUpdatedByAdmin;

    protected $table = 'visa_customer_level';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status',
        'is_default',
        'min_success_visa_per_month',
        'expire_days',
        'price_config',

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
        'price_config' => 'array'
    ];

    protected $appends = [
    ];

}
