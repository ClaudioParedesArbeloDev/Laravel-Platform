<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    /* protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    } */

    protected function title(): Attribute 
    {
        return Attribute::make(
            set: Function($value){
                return strtolower($value);
            });
    }


}
