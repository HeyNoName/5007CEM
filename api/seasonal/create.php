<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate seasonal object
include_once '../objects/seasonal.php';
  
$database = new Database();
$db = $database->getConnection();
  
$seasonal = new Seasonal($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->seasonal_name) &&
    !empty($data->seasonal_price) &&
    !empty($data->seasonal_desc) &&
    !empty($data->category)
){
  
    // set seasonal product property values
    $seasonal->seasonal_name = $data->seasonal_name;
    $seasonal->seasonal_price = $data->seasonal_price;
    $seasonal->seasonal_desc = $data->seasonal_desc;
    $seasonal->category = $data->category;
  
    // create the product
    if($seasonal->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Seasonal Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create seasonal product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create seasonal product. Data is incomplete."));
}
?>