<?php
class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "Unknown1599";
    private $dbName = "db_oop";



    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pwd);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}