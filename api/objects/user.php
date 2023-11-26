<?php
class User{
  
    private $conn;
    private $table_name = "user";
  
    public $id;
    public $username;
    public $email;
    public $password;
  
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT
                    u.id, u.username, u.email, u.password
                FROM
                    " . $this->table_name . " u
                ORDER BY
                    u.username DESC";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }

    function create() {
       $query = "INSERT INTO
            " . $this->table_name . "
        SET
           username=:username, email=:email, password=:password";

        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // Hash the password
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $hashed_password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function readOne(){
        $query = "SELECT
                   u.id, u.username, u.email, u.password
                FROM
                    " . $this->table_name . " u
                WHERE
                    u.id = ?
                LIMIT
                    0,1";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->username = $row['username'];
        $this->email = $row['email'];
        $this->password = $row['password'];
    }
    
    function update() {
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    username=:username, 
                    email=:email,
                    password=:password
                WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
    
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
    
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Unable to update user.");
            }
        } catch (PDOException $e) {
            // Log or handle the exception as needed
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
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
                     u.id, u.username, u.email, u.password
                FROM
                    " . $this->table_name . " u
                WHERE
                    u.username LIKE ? OR u.password LIKE ?
                ORDER BY
                    u.username DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT
                    u.id, u.username, u.email, u.password
                FROM
                    " . $this->table_name . " u
                ORDER BY u.username DESC
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