<?php
class Database {
    private $host = "localhost";
    private $db = "login_reg_oop";
    private $username = "shikikie";
    private $password = "Kikie@564133";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->username, $this->password);
            
        }catch(PDOException $e){
            echo "[Error] => ". $e->getMessage();

        }
        return $this->conn;
    }
}
?>