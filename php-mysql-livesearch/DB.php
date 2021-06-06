<?php

// function pdo_connect_mysql() {
//     // Update the details below with your MySQL details
//     $DATABASE_HOST = 'localhost';
//     $DATABASE_USER = 'root';
//     $DATABASE_PASS = 'root';
//     $DATABASE_NAME = 'livesearch';
//     try {
        
//         return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
//         echo "hello world";
//     } catch (PDOException $exception) {
//     	// If there is an error with the connection, stop the script and display the error.
//     	exit('Failed to connect to database!');
//     }
// }


class DB {
    private $con;
    private $host = "localhost";
    private $dbname = "livesearch";
    private $user = "root";
    private $password = "root";

    /**
     *  Constructor
     */

    public function __construct() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        try {
            $this->con = new PDO($dsn, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connection Successful";
        }
        catch(PDOException $e) {
        
            echo "Connection Failed: " . $e->getMessage();
            }
        }

    /**
     *  View the data in the database
     */
    
    public function viewData() {
        $query = "SELECT name FROM names";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     *  Search the data in the database by name
     */

    public function searchData($name) {
        $query = "SELECT name FROM names WHERE name LIKE :name";
        $stmt = $this->con->prepare($query);
        $stmt->execute(["name" => "%" . $name . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
