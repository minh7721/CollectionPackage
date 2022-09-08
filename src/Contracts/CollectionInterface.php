<?php

namespace MinhHN\Collection\Contracts;

interface CollectionInterface extends Arrayable, Jsonable
{
    public function clear();

    public function all();

    public function first();

    public function last();

    public function filter(\Closure $callback);

    public function map(\Closure $callback);

    public function avg($value);

    public function pluck($key);

    public function sortBy($key, $value);
}