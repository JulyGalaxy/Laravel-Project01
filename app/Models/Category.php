<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model//category -> category_id
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Blog::class);
    }
}
