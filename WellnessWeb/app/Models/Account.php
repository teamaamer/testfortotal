<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Account extends Model
{
    protected $fillable = [
        'name',
        'avatar',
        'mobile',
        'user_id',
        'summary',
        'website',
        'address',
        'city',
        'status',
        'zip_code',
        'country',
        'job_title',
        'degree',
        'specialty',
        'state_of_license',
        'department', // now free text
        'certifying_board',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function careers()
    {
        return $this->hasMany(Career::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function appliedCareers()
    {
        return $this->belongsToMany(Career::class, 'job_applications');
    }

    public function jobApplications()
    {
        return $this->hasManyThrough(
            JobApplication::class,
            Career::class,
            'account_id',   // Foreign key on careers table
            'career_id',    // Foreign key on job_applications table
            'id',           // local key on accounts table
            'id'            // local key on careers table
        );
    }
}
