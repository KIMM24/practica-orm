<?php

use App\Models\Level;
use Illuminate\Support\Facades\Route;
use App\Models\User;


// Ruta para la página principal
Route::get('/', function () {
    $users = User::all(); 
    
    return view('welcome', ['users' => $users]);
});

// Ruta para el perfil de usuario
Route::get('/profile/{id}',function($id){

    $user = User::find($id);

    // Obtiene posts del usuario y cuenta los comentarios 
    $posts = $user->posts()->with('category','image','tags')
    ->withCount('comments')->get();
    

    // Obtiene videos del usuario y cuenta los comentarios 
    $videos = $user->videos()->with('category','image','tags')
    ->withCount('comments')->get();

    // Devuelve la vista 'profile'
    return view('profile',[
        'user' => $user, 
        'posts' => $posts,
        'videos' => $videos
    ]);

})->name('profile');

Route::get('/level/{id}',function($id){

    $level = Level::find($id);

    // Obtiene posts del usuario y cuenta los comentarios 
    $posts = $level->posts()->with('category','image','tags')
    ->withCount('comments')->get();
    

    // Obtiene videos del usuario y cuenta los comentarios 
    $videos = $level->videos()->with('category','image','tags')
    ->withCount('comments')->get();

    // Devuelve la vista 'profile'
    return view('level',[
        'level' => $level, 
        'posts' => $posts,
        'videos' => $videos
    ]);

})->name('level');