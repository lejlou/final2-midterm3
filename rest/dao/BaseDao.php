<?php

class BaseDao {

    protected $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {
          
        $servername = "127.0.0.1"; 
        $port = 3306; 
        $database = "web_midd_makeup"; 
        $username = "root"; 
        $password = ""; 

        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */


        /** TODO
        * Create new connection
        */
        $this->conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

}
?>
