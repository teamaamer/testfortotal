<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Document extends Model
{

    protected $fillable = [
        'account_id',
        'title',
        'file_path',
        'type'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
