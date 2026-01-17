<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'city',
        'country',
        'account_id',
        'status',
        'summary',
        'salary',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function applicants()
    {
        return $this->belongsToMany(Account::class, 'job_applications');
    }
}
