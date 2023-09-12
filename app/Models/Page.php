<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use CreatedUpdatedByAdmin,HasSlug;
    public $slugBy = 'title';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'pages';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'status',
        'image',
        'created_by',
        'updated_by',
        'data_source_id',
        'source_url',
        'excerpt',
        'content',
        'country',
        'visit_count'
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
