<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once './test.php';
include_once './GetData.php';
$database = new Database();

$db = $database->getConnection();
$items = new users($db);
$records = $items->getEmployees();
$itemCount = $records->num_rows;
echo json_encode($itemCount);//列出有幾項
if($itemCount > 0){
$employeeArr = array();
$employeeArr["body"] = array();
while ($row = $records->fetch_assoc())
{
array_push($employeeArr["body"], $row);
}
echo json_encode($employeeArr);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>