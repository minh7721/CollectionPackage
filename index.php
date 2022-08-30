<?php
require_once __DIR__."/vendor/autoload.php";

use MinhHN\Collection\Data;
use MinhHN\Collection\Book;
use MinhHN\Collection\User;
use MinhHN\Collection\Collection;

$Book = new Book();
$User = new User();

$array = [
    ['name' => 'Nguyễn Gia Hào','age' => '23', 'email' => 'giahao9899@gmail.com', 'phone' => '01283180231'],
    ['name' => 'VNP Group','age' => '15', 'email' => 'vnp@gmail.com', 'phone' => '01283180231'],
    ['name' => 'MinhHN','age' => '21', 'email' => 'nhatminh7721@gmail.com', 'phone' => '0943199776'],
    ['name' => 'Phong','age' => '19', 'email' => 'phong@gmail.com', 'phone' => '0348203434'],
    ['name' => 'Hưng','age' => '21', 'email' => 'hung@gmail.com', 'phone' => '04394802384'],
    ['name' => 'Đăng','age' => '20', 'email' => 'dang@gmail.com', 'phone' => '10230121'],
    ['name' => 'Chiến','age' => '22', 'email' => 'chien@gmail.com', 'phone' => '34230429834'],
];

$User->setData($array);
$user = $User->arrToObj();

//print_r($user->dataValue());
//print_r($user->all());
//foreach ($user->dataValue() as $value){
//    echo $value->age."\n";
//}

//print_r($User->sortBy('desc'));

//$user->dataValue()[0]->name;
//print_r($User->first());

//print_r($User->last());

echo $user->avg('age');