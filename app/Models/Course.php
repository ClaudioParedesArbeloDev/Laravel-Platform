<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    protected $casts = [
        'active' => 'boolean',
    ];

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('enroll_day')->withTimestamps();;
    }
}
