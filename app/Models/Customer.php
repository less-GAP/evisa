<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'customers';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'email_verified_at',
        'status',
        'customer_group'
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
        //'product_descr' => 'array',
    ];

    protected $appends = [
        'customer_group_name',
    ];

    public function getCustomerGroupNameAttribute()
    {
        $cus = CustomerGroup::where('id', $this->customer_group)->first();
        return $cus->name;
    }

//    public function getImageUrlAttribute()
//    {
//        if ($this->image != '') {
//            return url('upload/' . $this->image, '', env('APP_ENV') == 'local' ? false : true);
//        }
//        return '';
//    }
}
