<?php

namespace MinhHN\Collection;

use MinhHN\Collection\Contracts\Arrayable;
use MinhHN\Collection\Contracts\Jsonable;

class Data1 implements Arrayable, Jsonable
{
    use HasAttributes;

    /**
     * @param array $attributes
     * @return Data1
     */
    public static function from(array $attributes = []): Data1
    {
        $instance = new static();
        return $instance->setAttributes($attributes);
    }

    public static function collection(array $items): Collection1
    {
        $items = array_map(function ($item) {
            if ($item instanceof static) {
                return $item;
            } else {
                return static::from($item);
            }
        }, $items);

        return new Collection1($items);
    }

    public function toArray(): array
    {
        return $this->attributesToArray();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}