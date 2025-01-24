<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
