<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*Definimos una sola ruta:
 * cuando alguien haga una periciópn Get a /api/posts/{id}
 * Se ejecuta el método Show que esta en el controlador
 */

Route::get('/posts/{id}', [PostController::class, 'show']);
