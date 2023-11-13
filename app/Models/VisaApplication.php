<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasOrderNo;
use App\Traits\HasVatFee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Panoscape\History\HasHistories;

class VisaApplication extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory, HasOrderNo, HasVatFee, HasHistories;

    protected $table = 'visa_application';

    public $timestamps = true;

    protected $fillable = [
        'number_of_visa',
        'type_of_visa',
        'date_arrival',
        'level_id',
        'entry_port',
        'processing_time',
        'est_delivery_time',
        'total_amount',
        'payment_method',
        'payment_status',
        'contact_name',
        'contact_email',
        'contact_phone',
        'user_id',
        'status',
        'approval_status',
        'square_payment_complete_at',
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
        'due_date' => 'datetime',
        'est_delivery_time' => 'datetime',
        'date_arrival' => 'datetime',
        'square_payment_complete_at' => 'datetime',
//        'password' => 'hashed',
    ];

    protected $appends = [
        'assigned_users'
    ];

    public function getModelLabel()
    {
        return $this->contact_name;
    }

    public function user()
    {
        return $this->belongsTo(VisaUser::class, 'user_id');
    }

    public function current_square_invoice()
    {
        return $this->hasOne(Invoice::class, 'class_key')
            ->where('type','evisa_sevice')
            ->where('payment_gateway','square')
            ->where('status','UNPAID')
            ->where('class', get_class($this))
            ->orderByDesc('id')
            ;

    }

    public function applicants()
    {
        return $this->hasMany(VisaApplicationApplicant::class, 'visa_application_id');
    }

    public function services()
    {
        return $this->belongsToMany(VisaServices::class, 'visa_application_services', 'visa_application_id', 'visa_application_service_id');
    }

    public function saveServices($items)
    {
        if (!is_array($items)) {
            return;
        }

        $data = [];
        foreach ($items as $item) {
            $data[$item['id']] = [
                'price' => $item['price_config'][$this->level_id],
                'level_id' => $this->level_id
            ];
        }
        $this->services()->sync($data);
        return $this->load('services');
    }

    public function comments()
    {
        return $this->hasMany(VisaApplicationComment::class, 'visa_application_id');
    }

    public function history()
    {
        return $this->hasMany(VisaApplicationHistory::class, 'visa_application_id');
    }

    public function assignees()
    {
        return $this->belongsToMany(User::class, 'visa_application_assignee', 'visa_application_id', 'user', 'id', 'username');
    }

    public function getAssignedUsersAttribute()
    {
        if ($this->assignees->count()) {
            return $this->assignees->pluck('username');
        }
        return [];
    }
}
