<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Relación que indica que un video pertenece a un usuario.
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    // Relación que indica que un video pertenece a una categoría.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación polimórfica que define que un video puede tener muchos comentarios.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable'); 
    }

    // Relación polimórfica que define que un video puede tener una imagen.
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); 
    }

    // Relación polimórfica que define que un video puede tener muchos tags.
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable'); 
    }

}

