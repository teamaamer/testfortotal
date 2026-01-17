<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
     protected $fillable = [
        'account_id',
        'career_id',
    ];

    // Relations
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
