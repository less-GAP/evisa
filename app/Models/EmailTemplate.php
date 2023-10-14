<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\CreatedUpdatedByAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailTemplate extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory ,CreatedUpdatedByAdmin;

    protected $table = 'email_templates';

    public $timestamps = true;

    protected $fillable = [
        'email_title',
        'status',
        'email_reply_to',
        'email_from',
        'email_cc',
        'email_bcc',
        'email_content',
        'content_type',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'product_descr' => 'array',
        'email_cc' => 'array',
        'email_bcc' => 'array',
    ];

}
