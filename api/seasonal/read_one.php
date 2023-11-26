<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/seasonal.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare seasonal product object
$seasonal = new Seasonal($db);
  
// set ID property of record to read
$seasonal->seasonal_id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of seasonal product to be edited
$seasonal->readOne();
  
if($seasonal->seasonal_name!=null){
    // create array
    $seasonal_arr = array(
        "id" =>  $seasonal->seasonal_id,
        "name" => $seasonal->seasonal_name,
        "description" => $seasonal->seasonal_desc,
        "price" => $seasonal->seasonal_price,
        "category" => $seasonal->category
  
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($seasonal_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user seasonal product does not exist
    echo json_encode(array("message" => "Seasonal Product does not exist."));
}
?>