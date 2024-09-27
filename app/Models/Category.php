<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class); // Una categoría puede tener muchos posts.
    }
 
    public function videos()
    {
        return $this->hasMany(Videos::class); // Una categoría puede tener muchos videos.
    }


}


