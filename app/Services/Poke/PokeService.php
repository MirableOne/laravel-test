<?php

namespace App\Services\Poke;

use App\Services\Poke\Exceptions\PokeException;
use App\Services\Poke\Models\Poke;
use JsonException;
use PokePHP\PokeApi;

class PokeService
{
    /**
     * @throws PokeException
     */
    public function getPokemon(string $id): Poke
    {
        $client = new PokeApi();

        $response = $client->pokemon($id);

        try {
            $decoded = $this->decode($response);
            return Poke::fromArray($decoded);
        } catch (\Throwable $ex) {
            throw new PokeException($ex->getMessage());
        }
    }

    /**
     * @throws JsonException
     */
    protected function decode(string $data): array
    {
        return json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    }
}
