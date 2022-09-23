<?php
require_once __DIR__."/vendor/autoload.php";

use MinhHN\Collection\Data1;
use MinhHN\Collection\QueryBuilder\QueryBuilder;
use MinhHN\Collection\QueryBuilder\Connection;


// Config database
$database =  [
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'question',
    'username' => 'root',
    'password' => 'password',
    'charset' => 'utf8',
];

$conn = Connection::make($database);
$query = new QueryBuilder($conn);

// Lấy ra tất cả giá trị trong bảng (Truyền tên bảng vào select)
$array = $query->select('question')->all();


// Khởi tạo collection
$collection = Data1::collection($array);

// Trả về tất cả giá trị của mảng
//print_r($collection->all());
//echo "\n\n";

// Tính trung bình
//print_r($col/lection->avg('id'));
//echo "\n\n";

// In ra tất cả giá trị của 1 cột
//print_r($collection->pluck('content'));
//echo "\n\n";


// Trả về số gấp đôi số cũ
//$newAge = $collection->map(function ($item){
//     return ($item->id)*2;
//});
//print_r($newAge);


// Tra ve so chan
//$tuoiChan = $collection->filter(function ($var){
//         return !($var->id & 1);
//});
//print_r($tuoiChan);

// Sap xep giam dan
//print_r($collection->sortBy('id', 'desc'));

