<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use App\Traits\HasCategories;
use App\Traits\HasSlug;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use CreatedUpdatedByAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'faqs';

    public $timestamps = true;

    protected $fillable = [
        'question',
        'answer',
        'order',
        'status',
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
    ];


}
