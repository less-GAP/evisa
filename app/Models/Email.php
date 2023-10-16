<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'emails';

    public $timestamps = true;

    protected $fillable = [
        'template_id',
        'status',
        'sent_at',
        'email_title',
        'email_data',
        'email_cc',
        'email_to',
        'email_bcc',
        'email_content',
        'created_by',
        'updated_by',
        'reference_class',
        'reference_key',
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
        'sent_at' => 'datetime',
        'email_data' => 'array',
        'email_cc' => 'array',
        'email_bcc' => 'array',
    ];

}
