<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './test.php';
include_once '../GetData.php';
$database = new Database();
$db = $database->getConnection();
$item = new users($db);


$item->username = $_GET['username'];
$item->password = $_GET['password'];
if($item->createEmployee()){
echo 'Employee created successfully.';
} else{
echo 'Employee could not be created.';
}
?>