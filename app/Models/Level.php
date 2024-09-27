<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    // Relación que indica que un nivel tiene muchos usuarios.
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Relación que indica que un nivel tiene muchos posts a través de los usuarios.
    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }

    // Relación que indica que un nivel tiene muchos videos a través de los usuarios.
    public function videos()
    {
        return $this->hasManyThrough(Video::class, User::class);
    }
}

