<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasProfilePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'name',
        'email',
        'phone',
        'email_verified_at',
        'status',
        'customer_group',
        'password',
        'referral_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
//        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    protected $appends = [
        'customer_group_name',
    ];

    public function getCustomerGroupNameAttribute()
    {
        if ($this->customer_group != '') {
            $cus = CustomerGroup::where('id', $this->customer_group)->first();
            return $cus->name;
        }
        return '';
    }

//    public function getImageUrlAttribute()
//    {
//        if ($this->image != '') {
//            return url('upload/' . $this->image, '', env('APP_ENV') == 'local' ? false : true);
//        }
//        return '';
//    }
}
