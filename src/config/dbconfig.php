<?php  
class Database
{
    public $conn;
    private $servername = "localhost";
    private $dbname = 'computerlaboratorymanagementsystem';
    private $username = 'root';
    private $password = "";
    public function dbConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname."", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            //echo 'Connection error: '.$exception->getMessage();
            echo 'Database connection Error. Please contact I.T.';
        }
        return $this->conn;
    }

}
