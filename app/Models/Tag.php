<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use CreatedUpdatedByAdmin,HasSlug;
    public $slugBy = 'name';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'tags';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
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
        'image_url'
    ];



    public function getImageUrlAttribute()
    {
        if ($this->image != '') {
            return url( $this->image, '', env('APP_ENV') == 'local' ? false : true);
        }
        return '';
    }
}
