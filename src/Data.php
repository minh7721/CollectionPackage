<?php
namespace MinhHN\Collection;
use mysql_xdevapi\Exception;
use stdClass;

class Data
{
    protected $data = [];

    public function __construct()
    {

    }


    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


    public function arrToObj(){
        $myobject = $this->arrayToObject($this->data);
        $data = (array) $myobject;
        $this->data = $data;
        return $this;
    }

    public function dataValue(){
        return $this->data;
    }

    function array_to_obj($array, &$obj)
    {
        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $obj->$key = new stdClass();
                $this->array_to_obj($value, $obj->$key);
            }
            else
            {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    function arrayToObject($array)
    {
        $object= new stdClass();
        return $this->array_to_obj($array, $object);
    }

    public function all(){
        return $this->data;
    }

    public function first(){
        return $this->data[0];
    }

    public function last(){
        $countData = count($this->data) - 1;
        return $this->data[$countData];
    }

    public function filter(){

    }
    public function map(){

    }

    public function avg($value){
            if(isset($this->data[0]->$value) && is_numeric($this->data[0]->$value)){
                $n = count($this->data);
                $sum = 0;
                $avg = 0;
                for($i = 0; $i < $n; $i++){
                    $sum = $sum + $this->data[$i]->$value;
                }
                $avg = $sum/$n;
                return round($avg, 4);
            }
            else {
                throw new Exception('Du lieu nhap vao khong dung dinh dang');
            }
    }

    public function pluck($data){

    }

    public function sortBy($key){
        if($key == "asc"){
            for($i = 0; $i < count($this->data); $i++){
                for ($j = $i; $j< count($this->data); $j++){
                    if($this->data[$i]->age > $this->data[$j]->age){
                        $temp = $this->data[$i]->age;
                        $this->data[$i]->age = $this->data[$j]->age;
                        $this->data[$j]->age = $temp;
                    }
                }
            }
        }
        elseif($key == "desc"){
            for($i = count($this->data) - 1; $i>=0; $i--){
                for ($j = $i ; $j >= 0; $j--){
                    if($this->data[$i]->age > $this->data[$j]->age){
                        $temp = $this->data[$i]->age;
                        $this->data[$i]->age = $this->data[$j]->age;
                        $this->data[$j]->age = $temp;
                    }
                }
            }
        }

        return $this->data;
    }


}