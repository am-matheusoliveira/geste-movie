<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

# OBS: Todas as rotas do sistema somente serão acessadas se o usuário estiver logado.


# ROTAS DO USUÁRIO COM VERIFICAÇÃO DE E-MAIL
Auth::routes(['verify' => true]);

# Login COM UM MIDDLEWARE CONFIGURADO, COM ELE O USUÁRIO APENAS ACESSARÁ ROTAS PUBLICAS
Route::get('/', function(){

    return view('auth/login');

})->middleware('guest');

// TESTE DE USO DO MIDDLEWARE - password.confirm DO LARAVEL UI
Route::get('/delete-account', function () {

    // Excluindo o usuário logado
    $user = auth()->user();
    $user->delete();

    // Fazendo logout
    auth()->logout();
    
    // Redirecionando para a tela de login com uma mensagem de sucesso
    return redirect('/login')->with('status', 'Sua conta foi excluída com sucesso.');

})->middleware(['auth', 'store.next.redirect', 'password.confirm:password.confirm, 0'])->name('delete-account');

# Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

# Genre
Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index'])->name('genre_index')->middleware('auth');
Route::post('/genre_insert', [App\Http\Controllers\GenreController::class, 'genre_insert'])->name('genre_insert')->middleware('auth');
Route::post('/genre_update', [App\Http\Controllers\GenreController::class, 'genre_update'])->name('genre_update')->middleware('auth');
Route::post('/genre_delete', [App\Http\Controllers\GenreController::class, 'genre_delete'])->name('genre_delete')->middleware('auth');

# Actor
Route::get('/actor',        [App\Http\Controllers\ActorController::class, 'index'])->name('actor_index')->middleware('auth');
Route::post('/actor_insert', [App\Http\Controllers\ActorController::class, 'actor_insert'])->name('actor_insert')->middleware('auth');
Route::post('/actor_update', [App\Http\Controllers\ActorController::class, 'actor_update'])->name('actor_update')->middleware('auth');
Route::post('/actor_delete', [App\Http\Controllers\ActorController::class, 'actor_delete'])->name('actor_delete')->middleware('auth');

# Director
Route::get('/director',        [App\Http\Controllers\DirectorController::class, 'index'])->name('director_index')->middleware('auth');
Route::post('/director_insert', [App\Http\Controllers\DirectorController::class, 'director_insert'])->name('director_insert')->middleware('auth');
Route::post('/director_update', [App\Http\Controllers\DirectorController::class, 'director_update'])->name('director_update')->middleware('auth');
Route::get('/director_delete', [App\Http\Controllers\DirectorController::class, 'director_delete'])->name('director_delete')->middleware('auth');

# Movie
Route::get('/movie', [App\Http\Controllers\MovieController::class, 'index'])->name('movie_index')->middleware('auth');
Route::post('/movie_insert_or_update', [App\Http\Controllers\MovieController::class, 'movie_insert_or_update'])->name('movie_insert_or_update')->middleware('auth');
Route::post('/movie_delete', [App\Http\Controllers\MovieController::class, 'movie_delete'])->name('movie_delete')->middleware('auth');

// Rota auxiliar usada pelo DataTables para renderizar a tabela de dados
Route::get('/movie_list_records', [App\Http\Controllers\MovieController::class, 'movie_list_records'])->name('movie_list_records')->middleware('auth');

# Movie List Genre and Actor
Route::post('/movie_list_genre', [App\Http\Controllers\MovieController::class, 'movie_list_genre'])->name('movie_list_genre')->middleware('auth');
Route::post('/movie_list_actor', [App\Http\Controllers\MovieController::class, 'movie_list_actor'])->name('movie_list_actor')->middleware('auth');

# Genre Movie
Route::post('/genre_movie', [App\Http\Controllers\MovieController::class, 'genre_movie_index'])->name('genre_movie_index')->middleware('auth');
Route::post('/genre_movie_insert', [App\Http\Controllers\MovieController::class, 'genre_movie_insert'])->name('genre_movie_insert')->middleware('auth');
Route::post('/genre_movie_update', [App\Http\Controllers\MovieController::class, 'genre_movie_update'])->name('genre_movie_update')->middleware('auth');
Route::post('/genre_movie_delete', [App\Http\Controllers\MovieController::class, 'genre_movie_delete'])->name('genre_movie_delete')->middleware('auth');

# Actor Movie
Route::post('/actor_movie', [App\Http\Controllers\MovieController::class, 'actor_movie_index'])->name('actor_movie_index')->middleware('auth');
Route::post('/actor_movie_insert', [App\Http\Controllers\MovieController::class, 'actor_movie_insert'])->name('actor_movie_insert')->middleware('auth');
Route::post('/actor_movie_update', [App\Http\Controllers\MovieController::class, 'actor_movie_update'])->name('actor_movie_update')->middleware('auth');
Route::post('/actor_movie_delete', [App\Http\Controllers\MovieController::class, 'actor_movie_delete'])->name('actor_movie_delete')->middleware('auth');
