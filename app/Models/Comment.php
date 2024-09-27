<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Relación polimórfica que indica que un comentario puede pertenecer a diferentes modelos.
    public function commentable()
    {
        return $this->morphTo(); 
    }

    // Relación que indica que un comentario pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}

