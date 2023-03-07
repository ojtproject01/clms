<?php

class PC{
    public function __construct($db){
        $this->conn = $db;
    }


    public function fetchPCItems(){
        $sql = "SELECT * FROM `clms_pc` AS PC LEFT JOIN (SELECT `srcode`, `lastname`, `firstname` FROM `clms_users`) AS USER ON PC.user_srcode = USER.srcode ORDER BY PC.pc_number ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $res;
    }
    
    
    public function fetchTotalItems(){
        $qry = "SELECT 
                    COUNT(*) AS total, 
                    SUM(CASE WHEN status = 'available' THEN 1 ELSE 0 END) AS available,
                    SUM(CASE WHEN status = 'occupied' THEN 1 ELSE 0 END) AS occupied
                FROM `clms_pc`;";
        $qry_total = $this->conn->prepare($qry);
        $qry_total->execute();
        $res = $qry_total->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function addPC(){
        $sql = "INSERT INTO `clms_pc` (`pc_number`, `status`) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($this->pc_number, 'available'));
        $stmt->closeCursor();
        if($stmt){
            return "Success";
        }else{
            return "Failed";
        }
    }

    public function listPC(){
        $sql = "SELECT * FROM `clms_pc`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
       
        if($stmt){
            return $res;
        }
    }

}