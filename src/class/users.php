<?php
declare(strict_types=1);
class Users
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function authenticateUser()
    {
        //CHECK IF ACCOUNT EXISTS AND ENABLED
        $sqlQuery = "SELECT * 
        FROM clms_admin 
        WHERE username = ?;
        ";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($this->username));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if ($stmt) {
            
            if ($res) {
                $passwordhash = $res['password'];

                if (password_verify($this->password, $passwordhash)) {
                    //VALID PASSWORD
                    //START SESSION 
                    session_start();
                    $_SESSION['username'] = $res['username'];
                    $_SESSION['fullname'] = $res['fullname'];
                    $_SESSION['userid'] = $res['admin_id'];
                    $_SESSION['loggedin'] = true;
                    return "login";
                } else {
                    //INVALID PASSWORD
                    return "invalidpass";
                }
            } else {
                return "notexist";
            }
        } else {
            return "failed";
        }
    }
}

