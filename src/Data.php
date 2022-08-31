<?php
namespace MinhHN\Collection;
use stdClass;

class Data extends Collection
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


}