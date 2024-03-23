<?php

namespace App\Http\Controllers\Api;

use App\Services\Poke\PokeService;

class PokeController extends Controller
{
    public function index(string $id, PokeService $pokeService)
    {
        return response()->json($pokeService->getPokemon($id));
    }
}
