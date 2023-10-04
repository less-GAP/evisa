<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasProfilePhoto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class VisaUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'customer_level',
        'customer_level_expired_at',
        'email',
        'phone',
        'type',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'customer_level_expired_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'submit_visa_number'
    ];
    public function getSubmitVisaNumberAttribute(){
        return $this->visa_applications->count();
    }
    public function visa_applications(){
        return $this->hasMany(VisaApplication::class,'user_id');
    }
    public function level()
    {
        return $this->belongsTo(VisaCustomerLevel::class, 'customer_level');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->customer_level = default_visa_customer_level_id();
        });
        static::saving(function ($model) {
            if ($model->isDirty('customer_level')) {
                $level = VisaCustomerLevel::find($model->customer_level);
                if ($level) {
                    if ($level->expire_days) {
                        $model->customer_level_expired_at = Carbon::now()->addDays($level->expire_days)->format('yyy-mm-dd');
                    } else {
                        $model->customer_level_expired_at = null;
                    }
                }
            }
        });
    }
}
