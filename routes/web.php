<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\GraficaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\GlucemiasController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\likeGlucemiaController;
use App\Http\Controllers\LikeHistoriaController;
use App\Http\Controllers\UserFollowersController;
use App\Http\Controllers\UserFollowingsController;
use App\Http\Controllers\ComentariosCitasController;
use App\Http\Controllers\GlucemiaComentarioController;
use App\Http\Controllers\ComentariosTratamientoController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Followers
Route::get('/followers/{user:name}', UserFollowersController::class )->name('user.followers');

Route::get('/followings/{user:name}', UserFollowingsController::class )->name('user.followings');



// Historia
Route::get('/historia', [HistoriaController::class, 'index'])->middleware(['auth', 'verified'])->name('historia.index');

Route::get('/historia/create',[HistoriaController::class ,'create'] )->middleware(['auth', 'verified'])->name('historia.create');

Route::get('/historia:{historia}/edit',[HistoriaController::class ,'edit'] )->middleware(['auth', 'verified'])->name('historia.edit');

Route::get('/historia/{user:name}',[HistoriaController::class ,'show'] )->middleware(['auth', 'verified'])->name('historia.show');

// Route::post('/historia/{user:name}/likes',[LikeHistoriaController::class, 'store'] )->middleware(['auth', 'verified'])->name('historia.likes.store');

// Route::delete('/historia/{user:name}/likes',[LikeHistoriaController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('historia.likes.destroy');

// Route::get('/historia:{historia:nombre}/likes',[LikeHistoriaController::class, 'index'] )->middleware(['auth', 'verified'])->name('history.index');




// Usuarios
Route::get('/usuarios',[UsuariosController::class ,'index'] )->middleware(['auth', 'verified'])->name('usuarios.index');

Route::post('/usuarios/{user:name}', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/usuarios/{user:name}', [FollowerController::class, 'destroy'])->name('users.unfollow');



// Glucemias
Route::get('/glucemias',[GlucemiasController::class,'index'] )->middleware(['auth', 'verified'])->name('glucemias.index');

Route::get('/glucemias/create',[GlucemiasController::class,'store'] )->middleware(['auth', 'verified'])->name('glucemias.create');

Route::get('/glucemias/edit:{glucemia}',[GlucemiasController::class,'edit'] )->middleware(['auth', 'verified'])->name('glucemias.edit');

Route::get('/glucemias/{user:name}',[GlucemiasController::class,'show'] )->middleware(['auth', 'verified'])->name('glucemias.show');


Route::get('/glucemia:{glucemia:id}/{user:name}',[likeGlucemiaController::class, 'show'] )->middleware(['auth', 'verified'])->name('likeglucemia.show');


// Route::post('/glucemia:{glucemia:id}/{user:name}/likes',[likeGlucemiaController::class, 'store'] )->middleware(['auth', 'verified'])->name('glucemia.likes.store');

// Route::delete('/glucemia:{glucemia:id}/{user:name}/likes',[likeGlucemiaController::class, 'destroy'] )->middleware(['auth', 'verified'])->name('glucemia.likes.destroy');




// Tratamiento
Route::get('/tratamiento',[TratamientoController::class ,'index'] )->middleware(['auth', 'verified'])->name('tratamientos.index');

Route::get('/tratamiento/create', [TratamientoController::class,'store'] )->middleware(['auth', 'verified'])->name('tratamientos.create');

Route::get('/tratamiento/edit:{tratamiento:id}', [TratamientoController::class,'edit'] )->middleware(['auth', 'verified'])->name('tratamientos.edit');

Route::get('/tratamiento/{user:name}',[TratamientoController::class,'show'] )->middleware(['auth', 'verified'])->name('tratamientos.show');

Route::get('/tratamiento:{tratamiento:id}/{user:name}',[ComentariosTratamientoController::class, 'show'] )->middleware(['auth', 'verified'])->name('comentariotratamiento.show');



//Citas
Route::get('/citas', [CitasController::class, 'index'])->middleware(['auth', 'verified'])->name('citas.index');

Route::get('/citas/create', [CitasController::class, 'store'])->middleware(['auth', 'verified'])->name('citas.create');

Route::get('/citas/edit:{cita}',[CitasController::class ,'edit'] )->middleware(['auth', 'verified'])->name('citas.edit');

Route::get('/citas/{user:name}',[CitasController::class,'show'] )->middleware(['auth', 'verified'])->name('citas.show');

Route::get('/cita:{cita:id}/{user:name}',[ComentariosCitasController::class, 'show'] )->middleware(['auth', 'verified'])->name('comentarioscitas.show');


// Grafica
Route::get('/grafica/{user:name}',[GraficaController::class,'show'] )->middleware(['auth', 'verified'])->name('grafica.show');


//Notificaciones
Route::get('/notificaciones', NotificationController::class)->name('notificaciones');




// Route::get('/{user:name}/glucemia:{glucemia:id}',[likeGlucemiaController::class, 'index'] )->middleware(['auth', 'verified'])->name('likeglucemia.index');

Route::get('/{user:name}/{glucemia}',[GlucemiaComentarioController::class, 'store'] )->middleware(['auth', 'verified'])->name('comentarios.store');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
