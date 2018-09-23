<?php

class Database{
    // DB Parameters
    private $host = 'localhost';
    private $dbname = 'rest';
    private $user = 'root';
    private $pass = '';
    private $conn;

    //Connect

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch(PDOException $e){
            echo 'Connection error:'. $e->getMessage();
        }
    }

}