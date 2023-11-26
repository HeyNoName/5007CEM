<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/seasonal.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare seasonal product object
$seasonal = new Seasonal($db);
  
// get id of seasonal product to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of seasonal product to be edited
$seasonal->id = $data->id;
  
// set product property values
$seasonal->name = $data->name;
$seasonal->price = $data->price;
$seasonal->description = $data->description;
$seasonal->category = $data->category;
  
// update the product
if($seasonal->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Seasonal Product was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update seasonal product."));
}
?>