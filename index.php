<?php
require_once __DIR__."/vendor/autoload.php";

use MinhHN\Collection\Book;
use MinhHN\Collection\User;

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

print_r($user->all());
foreach ($user->dataValue() as $value){
    echo $value->name."\n";
}

print_r($User->sortBy('desc'));

print_r($User->first());

print_r($User->last());

echo $user->avg('age');

print_r($user->filter('age', '<', '20'));

print_r($user->pluck('name'));
