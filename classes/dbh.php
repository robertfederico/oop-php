<?php
class Dbh
{
    private $host = "";
    private $user = "";
    private $pwd = "";
    private $dbName = "";



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
