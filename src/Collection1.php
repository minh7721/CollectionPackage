<?php

namespace MinhHN\Collection;

use Exception;
use MinhHN\Collection\Contracts\CollectionInterface;

class Collection1 implements CollectionInterface
{

    private array $elements;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    protected function createFrom(array $elements): Collection1
    {
        return new static($elements);
    }

    //Tra ve tat ca gia tri cua mang
    public function all(): array
    {
        return $this->elements;
    }

    // Tra ve gia tri dau tien
    public function first(){
        return reset($this->elements);
    }

    // Tra ve gia tri cuoi cung
    public function last(){
        return end($this->elements);
    }

    // Loc gia tri cua mang theo yc
    public function filter(\Closure $callback): Collection1
    {
        return $this->createFrom(array_filter($this->elements, $callback, ARRAY_FILTER_USE_BOTH));
    }

    public function map(\Closure $callback): Collection1
    {
        return $this->createFrom(array_map($callback, $this->elements));
    }

    public function test(){
        return $this->elements;
    }

    /**
     * @throws Exception
     */
    public function avg($value): float
    {
        if(is_numeric($this->elements[0]->$value)){
            $n = count($this->elements);
            $sum = 0;
            $avg = 0;
            for($i = 0; $i < $n; $i++){
                $sum = $sum + $this->elements[$i]->$value;
            }
            $avg = $sum/$n;
            return round($avg, 4);
        }
        else {
            throw new Exception('Du lieu nhap vao khong dung dinh dang');
        }
    }


    /**
     * @throws Exception
     */

    // Show tat ca gia tri cua $key trong mang
    public function pluck($key){
        try {
            if($this->elements[0]->$key != null){
                $items = [];
                foreach ($this->elements as $data){
                    $items[] = $data->$key;
                }
                return $items;
            }
            else{
                throw new Exception("Khong tim thay $key trong du lieu");
            }
        }
        catch (Exception $e){
            return 'Message: ' .$e->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function sortBy($key, $value){
        $value = strtolower($value);
        $items = $this->elements;
        if($items[0]->$key != null || $items[0]->$key != ''){
            if($value == "asc"){
                for($i = 0; $i < count($items); $i++){
                    for ($j = $i; $j< count($items); $j++){
                        if($items[$i]->$key > $items[$j]->$key){
                            $temp = $items[$i]->$key;
                            $items[$i]->$key = $items[$j]->$key;
                            $items[$j]->$key = $temp;
                        }
                    }
                }
            }
            elseif($value == "desc"){
                for($i = count($items) - 1; $i>=0; $i--){
                    for ($j = $i ; $j >= 0; $j--){
                        if($items[$i]->$key > $items[$j]->$key){
                            $temp = $items[$i]->$key;
                            $items[$i]->$key = $items[$j]->$key;
                            $items[$j]->$key = $temp;
                        }
                    }
                }
            }
            else{
                throw new Exception("Gia tri nhap vao chi co the la asc(tang dan) va desc(giam dan)");
            }
        }
        else{
            throw new Exception("Khong tim thay $key trong mang");
        }
        return $items;
    }

    public function clear()
    {
        $this->elements = [];
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function __toString()
    {
        return self::class . '@' . spl_object_hash($this);
    }


    public function toArray()
    {
        return $this->elements;
    }

    public function toJson($options)
    {
        return $this->elements;
    }
}