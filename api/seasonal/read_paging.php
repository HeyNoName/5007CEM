<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/seasonal.php';
  
// utilities
$utilities = new Utilities();
  
// instantiate database and seasonal product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$seasonal = new Seasonal($db);
  
// query seasonal products
$stmt = $seasonal->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $seasonal_arr=array();
    $seasonal_arr["records"]=array();
    $seasonal_arr["paging"]=array();
  
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
  
  
    // include paging
    $total_rows=$seasonal->count();
    $page_url="{$home_url}seasonal/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $seasonal_arr["paging"]=$paging;
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($seasonal_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user seasonal products does not exist
    echo json_encode(
        array("message" => "No seasonal products found.")
    );
}
?>