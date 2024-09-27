<?php

namespace App\Models;

// Illuminate proporciona herramientas para la autenticación y la notificación de usuarios.
// use Illuminate\Contracts\Auth\MustVerifyEmail; // Interface opcional para verificación de email.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos que se pueden asignar en masa (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Atributos que deben estar ocultos cuando se serializa el modelo a JSON o a otros formatos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de atributos a otros tipos (casting).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Un usuario tiene un perfil.
    public function profile()
    {
        return $this->hasOne(Profile::class); 
    }

    // Un usuario pertenece a un nivel.
    public function level()
    {
        return $this->belongsTo(Level::class); 
    }

    // Un usuario puede estar en muchos grupos.
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps(); 
    }

    // Un usuario tiene una ubicación a través de su perfil.
    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class); 
    }

    // Un usuario puede tener muchos posts.
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Un usuario puede tener muchos videos.
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // Un usuario puede tener muchos comentarios.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Un usuario puede tener una imagen de perfil.
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); 
    }
}

