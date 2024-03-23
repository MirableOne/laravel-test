<?php

namespace App\Services\Poke\Models;

use App\Services\Model;

class Poke extends Model
{
    public int $id;
    public string $name;
    public int $base_experience;
    public int $height;
    public bool $is_default;
    public int $order;
    public int $weight;

    protected array $jsonFields = [
        'id', 'name', 'base_experience', 'height', 'is_default', 'order', 'weight',
    ];
}
