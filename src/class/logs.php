<?php
declare(strict_types=1);
class Logs
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function timeInLogs(){
        $sqlQuery = "UPDATE clms_pc SET status = 'occupied', user_srcode = ?, datetime = ? WHERE pc_number = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($this->srcodeid, $this->currentDateTime, $this->pc_id));
        $stmt->closeCursor();

        if($stmt){
            return "Success";
        }

    }

    public function timeOutLogs(){
        $sqlQuery = "UPDATE clms_pc SET status = 'available', user_srcode = NULL, datetime = NULL WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($this->pc_id));
        $stmt->closeCursor();

        if($stmt){
            return "Success";
        }

    }
    
}