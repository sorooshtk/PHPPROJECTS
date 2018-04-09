<?php
class connect{
    private $server;
    private $root;
    private $pass;
    private $dbname;
    private $charset;
    private $dsn;
    private $conn;
    private function connecting(){
        $this->server = "localhost";
        $this->root = "root";
        $this->pass = "";
        $this->dbname = "userview";
        $this->charset = "utf8mb4";
        try{
            $this->dsn = "mysql:host=".$this->server.";dbname=".$this->dbname.";charset=".$this->charset;
            $this->conn = new PDO($this->dsn,$this->root,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }catch(PDOException $value){
            echo "Failed to connect to Database: ".$value->getMessage();
        }
    }
    protected function conn(){
        return $this->connecting();
    }
}
?>
