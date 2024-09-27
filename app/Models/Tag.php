<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Relación polimórfica que indica que un tag puede ser asociado con muchos posts.
    public function posts()
    {
        return $this->morphedByMany(Posts::class, 'postable'); 
    }

    // Relación polimórfica que indica que un tag puede ser asociado con muchos videos.
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable'); 
    }
}

