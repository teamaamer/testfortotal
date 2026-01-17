<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'course_id',
        'account_id',
        'comment',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
