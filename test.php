<?php
require_once __DIR__."/vendor/autoload.php";

//use MinhHN\Collection\Collection\Collection;
//use MinhHN\Collection\Collection\Collection1;
use MinhHN\Collection\Collection1\Collection;
$array = [
    ['name' => 'Nguyễn Gia Hào','age' => '23', 'email' => 'giahao9899@gmail.com', 'phone' => '01283180231'],
    ['name' => 'VNP Group','age' => '15', 'email' => 'vnp@gmail.com', 'phone' => '01283180231'],
    ['name' => 'MinhHN','age' => '21', 'email' => 'nhatminh7721@gmail.com', 'phone' => '0943199776'],
    ['name' => 'Phong','age' => '19', 'email' => 'phong@gmail.com', 'phone' => '0348203434'],
    ['name' => 'Hưng','age' => '21', 'email' => 'hung@gmail.com', 'phone' => '04394802384'],
    ['name' => 'Đăng','age' => '20', 'email' => 'dang@gmail.com', 'phone' => '10230121'],
    ['name' => 'Chiến','age' => '22', 'email' => 'chien@gmail.com', 'phone' => '34230429834'],
];

$arr = [1,2,3];

//$a =  new Collection($array);
//print_r($a->all());


//$a = new Collection1($array);
//
//print_r($a->avg('age'));

$collection = new Collection($array);
//$newCollection = $collection->map(function ($item) {
//    return $item * 2;
//});

print_r($collection->all());

//print_r($newCollection->all()); // [2, 4, 6, 8]
//print_r($collection->all()); // [1, 2, 3, 4]