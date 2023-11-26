<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/seasonal.php';
  
// instantiate database and seasonal product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$seasonal = new Seasonal($db);
  
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
  
// query Seasonal products
$stmt = $seasonal->search($keywords);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $seasonal_arr=array();
    $seasonal_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $seasonal_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category" => $category
        );
  
        array_push($seasonal_arr["records"], $seasonal_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show seasonal products data
    echo json_encode($seasonal_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no seasonal products found
    echo json_encode(
        array("message" => "No seasonal products found.")
    );
}
?>