<?php
require_once __DIR__."/vendor/autoload.php";

use MinhHN\Collection\Data1;
$array = [
    ['name' => 'Nguyễn Gia Hào','age' => '23', 'email' => 'giahao9899@gmail.com', 'phone' => '01283180231'],
    ['name' => 'VNP Group','age' => '15', 'email' => 'vnp@gmail.com', 'phone' => '01283180231'],
    ['name' => 'MinhHN','age' => '21', 'email' => 'nhatminh7721@gmail.com', 'phone' => '0943199776'],
    ['name' => 'Phong','age' => '19', 'email' => 'phong@gmail.com', 'phone' => '0348203434'],
    ['name' => 'Hưng','age' => '21', 'email' => 'hung@gmail.com', 'phone' => '04394802384'],
    ['name' => 'Đăng','age' => '20', 'email' => 'dang@gmail.com', 'phone' => '10230121'],
    ['name' => 'Chiến','age' => '22', 'email' => 'chien@gmail.com', 'phone' => '34230429834'],
];

$arr = [1,2,3,4,6,3,2,1];

$data = new Data1();
$collection = $data::collection($array);
//print_r($collection->all());
//echo "\n\n";
//print_r($collection->avg('age'));
//echo "\n\n";
//print_r($collection->pluck('name'));
//echo "\n\n";
//print_r($collection->sortBy('age','asc'));

//echo "Tuoi ban dau: ";
//foreach ($collection->all() as $dt){
//    print_r($dt->age);
//    echo " ";
//}
//
//echo "\n";
//echo "Tuoi luc sau: ";
//$collection->filter(function ($item){
//     print_r(($item->age)*2);
//     echo " ";
//});
