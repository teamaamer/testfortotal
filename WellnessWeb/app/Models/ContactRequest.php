<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $fillable = [
        'account_id',
        'device_id',
        'target_device_id',
        'message',
        'phone',
        'email',
        'name',
        'type',
        'problem_type',
        'city',
        'country',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function targetDevice()
    {
        return $this->belongsTo(Device::class, 'target_device_id');
    }
}
