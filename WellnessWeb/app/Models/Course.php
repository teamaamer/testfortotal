<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'image',
        'account_id',
        'start_on',
        'status',
        'summary',
        'full_summary',
        'requirements',
        'price',
    ];

    public function academy()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'course_likes')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsCount()
    {
        return $this->hasMany(Comment::class)->count();
    }
}
