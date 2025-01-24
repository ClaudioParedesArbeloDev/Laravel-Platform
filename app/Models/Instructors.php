<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructors extends Model
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
