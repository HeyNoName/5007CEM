<?php
class Seasonal{
  
    // database connection and table name
    private $conn;
    private $table_name = "seasonal";
  
    // object properties
    public $seasonal_id;
    public $seasonal_name;
    public $seasonal_desc;
    public $price;
    public $image;
    public $category;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT
                    s.image, s.seasonal_id, s.seasonal_name, s.seasonal_desc, s.seasonal_price, s.category
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.seasonal_desc DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create product
    function create(){
    
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                seasonal_name=:name, seasonal_price=:price, seasonal_desc=:description, category=:category, image=:image";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->seasonal_name = htmlspecialchars(strip_tags($this->seasonal_name));
    $this->price = htmlspecialchars(strip_tags($this->seasonal_price));
    $this->description = htmlspecialchars(strip_tags($this->seasonal_desc));
    $this->category = htmlspecialchars(strip_tags($this->category));
    $this->image = htmlspecialchars(strip_tags($this->image));

    // bind values
    $stmt->bindParam(":name", $this->seasonal_name);
    $stmt->bindParam(":price", $this->seasonal_price);
    $stmt->bindParam(":description", $this->seasonal_desc);
    $stmt->bindParam(":category", $this->category);
    $stmt->bindParam(":image", $this->image);

    // execute query
    if($stmt->execute()){
        return true;
    }

    return false;
}

    // used when filling up the update product form
    function readOne(){
    
        // query to read single record
        $query = "SELECT
                    s.image, s.seasonal_id, s.seasonal_name, s.seasonal_desc, s.seasonal_price, s.category
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.seasonal_id = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->seasonal_name = $row['seasonal_name'];
        $this->seasonal_price = $row['seasonal_price'];
        $this->seasonal_desc = $row['seasonal_desc'];
        $this->category = $row['category'];
        $this->image = $row['image'];
        
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    seasonal_name = :name,
                    seasonal_price = :price,
                    seasonal_desc = :description,
                    category = :category
                WHERE
                seasonal_id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->seasonal_name));
        $this->price=htmlspecialchars(strip_tags($this->seasonal_price));
        $this->description=htmlspecialchars(strip_tags($this->seasonal_desc));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->id=htmlspecialchars(strip_tags($this->seasonal_id));
    
        // bind new values
        $stmt->bindParam(':name', $this->seasonal_name);
        $stmt->bindParam(':price', $this->seasonal_price);
        $stmt->bindParam(':description', $this->seasonal_desc);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->seasonal_id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE seasonal_id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // search products
    function search($keywords){
    
        // select all query
        $query = "SELECT
                    s.image, s.seasonal_id, s.seasonal_name, s.seasonal_desc, s.seasonal_price, s.category
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.seasonal_name LIKE ? OR s.seasonal_desc LIKE ? OR s.category LIKE ?
                ORDER BY
                    s.description DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT
                    s.seasonal_id, s.seasonal_name, s.seasonal_desc, s.seasonal_price, s.category, s.image
                FROM
                    " . $this->table_name . " s
                ORDER BY s.seasonal_desc DESC
                LIMIT ?, ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
}
?>