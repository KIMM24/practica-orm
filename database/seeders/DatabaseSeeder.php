<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Creación de 3 grupos en la base de datos
        Group::factory()->count(3)->create();

        // Creación de niveles para los grupos
        Level::factory()->create(['name' => 'Oro']); // nivel Oro
        Level::factory()->create(['name' => 'Plata']); // nivel Plata
        Level::factory()->create(['name' => 'Bronce']); // nivel Bronce

        //  5 usuarios y que se les asignan a perfiles, ubicaciones y grupos
        User::factory()->count(5)->create()->each(function ($user) {
            // Un perfil para el usuario
            $profile = $user->profile()->save(Profile::factory()->make());

            // Asignación de ubicación a perfil
            $profile->location()->save(Location::factory()->make());

            // Se asocia al usuario con un número aleatorio de grupos
            $user->groups()->attach($this->array(rand(1, 3)));

            // Imagen para usuario
            $user->image()->save(Image::factory()->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
        });

        // 4 categorías
        Category::factory()->count(4)->create();

        // 12 etiquetas (tags)
        Tag::factory()->count(12)->create();

        // 40 publicaciones (posts)
        Post::factory()->count(40)->create()->each(function ($post) {
            // Imagen para cada publicación
            $post->image()->save(Image::factory()->make());

            // Se asocia un número aleatorio de etiquetas a la publicación
            $post->tags()->attach($this->array(rand(1, 12)));

            // Número aleatorio de comentarios para publicación
            $number_comments = rand(1, 6);
            for ($i = 0; $i < $number_comments; $i++) {
                $post->comments()->save(Comment::factory()->make());
            }
        });

        //  40 videos
        Video::factory()->count(40)->create()->each(function ($video) {
            // Una imagen para cada video
            $video->image()->save(Image::factory()->make());

            // Un número aleatorio de etiquetas al video
            $video->tags()->attach($this->array(rand(1, 12)));

            // Número aleatorio de comentarios para el video
            $number_comments = rand(1, 6);
            for ($i = 0; $i < $number_comments; $i++) {
                $video->comments()->save(Comment::factory()->make());
            }
        });

        // Se crea un usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    // Método que genera un array de valores de 1 a $max.
    public function array($max)
    {
        $values = [];

        // Se llena el array con valores del 1 al $max
        for ($i = 1; $i <= $max; $i++) {
            $values[] = $i;
        }

        return $values; // Se devuelve el array generado
    }
}



