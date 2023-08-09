<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCourseProduct extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'package_course_product';

    public $timestamps = false;

    protected $fillable = [
        'package_course_id',
        'product_id',
        'product_descr',
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
        'product_descr' => 'array',
    ];

    protected $appends = [
        'product_detail'
    ];

    public function getProductDetailAttribute()
    {
        $product = Product::where('id', $this->product_id)->first()->toArray();
        if (!empty($product)) {
            return $product;
        } else {
            return $this->product_descr;
        }
    }
}
