<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [
        'image',
        'name',
        'type',
        'slug',
        'short_description',
        'description',
        'price',
        'sale_price',
        'point',
        'status',
        'title',
        'meta_description',
        'meta_keyword'
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
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image != '') {
            return url('upload/' . $this->image, '', env('APP_ENV') == 'local' ? false : true);
        }
        return '';
    }
}
