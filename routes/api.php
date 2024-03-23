<?php

use App\Http\Controllers\Api\PokeController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function (Router $router) {
    $router->get('/poke/{id}', [PokeController::class, 'index']);
});
