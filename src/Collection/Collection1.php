<?php

namespace MinhHN\Collection\Collection;

use IteratorAggregate;
use Traversable;

class Collection1 implements IteratorAggregate
{
    protected $items = [];

    /**
     * Khởi tạo items bằng cách tạo một instance của ArrayIterator.
     *
     * @param array  $items
     * @return void
     */
    public function __construct($items = [])
    {
        $this->items = new ArrayIterator($this->getArrayableItems($items));
    }

    /**
     * Hàm này sẽ trả về một array cho việc khởi tạo thuộc tính items ở hàm __construct.
     *
     * @param  mixed  $items
     * @return array
     */
    protected function getArrayableItems($items)
    {
        if (is_array($items)) { // Nếu là một array thì return $item luôn
            return $items;
        } elseif ($items instanceof Traversable) { // Nếu là một thể hiện của Traversable thì sử dụng hàm iterator_to_array để chuyển từ iterator về array
            return iterator_to_array($items);
        }

        return (array) $items; // nếu là loại khác, ép kiểu về dạng array
    }

    /**
     * Get an iterator for the items.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return $this->items;
    }


    public function all(): array
    {
        return iterator_to_array($this->items);
    }

    public function avg($key)
    {
        $data = iterator_to_array($this->items);
        $n = count($data);
        $sum = 0;
        $avg = 0;
        for($i = 0; $i < $n; $i++){
            $sum = $sum + $data[$i][$key];
        }
        $avg = $sum/$n;
        return round($avg, 4);
    }

    public function map(callable $callback)
    {
        $items = $this->all();
        $keys = array_keys($items);

        $items = array_map($callback, $items, $keys);

        return new static(array_combine($keys, $items));
    }





    /**
     * @param  string  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * @return void
     */
    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param  TKey  $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->items[$key]);
    }




    public function __call($name, $arguments)
    {
        if (method_exists($this->items, $name)) {
            return call_user_func_array([$this->items, $name], $arguments);
        }
    }


}