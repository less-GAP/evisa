<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyLevel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory,CreatedUpdatedByAdmin;

    protected $table = 'agency_level';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'status',
        'min_success_visa_per_month',
        'processing_time_pricing',
        'expire_days',

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
        'processing_time_pricing'=>'array'
    ];

    protected $appends = [
    ];

}
