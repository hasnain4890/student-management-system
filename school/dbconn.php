<?php



class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli('localhost', 'hasnain', '4890', 'crud-oop');

        if ($conn->connect_error) {
            die("<h1>Database Connection Failed</h1>");
        }
        //echo "Database Connected Successfully";
        return $this->conn = $conn;
    }
}
