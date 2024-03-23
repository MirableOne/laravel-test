<?php

namespace App\Services;

abstract class Model implements \JsonSerializable
{
    protected array $hydrationMapping = [];

    protected array $jsonFields = [];

    public static function fromArray(array $params): static
    {
        $model = new static();
        $model->hydrate($params);

        return $model;
    }

    public function hydrate(array $params): void
    {
        if (count($this->hydrationMapping) > 0) {
            foreach ($this->hydrationMapping as $key => $value) {
                if (isset($params[$key])) {
                    $this->$key = $value;
                }
            }
        } else {
            foreach ($params as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function jsonSerialize(): mixed
    {
        $res = [];
        foreach ($this->jsonFields as $value) {
            $res[$value] = $this->$value;
        }

        return $res;
    }
}
