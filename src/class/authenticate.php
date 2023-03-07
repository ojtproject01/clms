<?php
declare (strict_types = 1);
// include_once '..\config\dbconfig.php';
class Authenticate
{

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function authenticateUser()
    {
        //CHECK IF ACCOUNT EXISTS AND ENABLED
        $sqlQuery = "SELECT USERNAME.UserID, USERNAME.Username, USERS.Enabled, COUNT(USERNAME.UserName) AS 'COUNT' FROM (SELECT [UserID]
        ,[Enabled]
    FROM [DealerOnlineOrderingSystem].[dbo].[DOOS_Users]) USERS
    LEFT OUTER JOIN
    (
    SELECT UserID, EmployeeID AS 'Username'
    FROM [DealerOnlineOrderingSystem].[dbo].[DOOS_Administrators]
    ) USERNAME ON USERS.UserID = USERNAME.UserID WHERE USERNAME.Username = ?
    GROUP BY USERNAME.UserID, USERNAME.Username, USERS.Enabled";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($this->username));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if ($res) {
            $usercount = $res['COUNT'];
            $enabled = $res['Enabled'];
            $userid = $res['UserID'];
            $username = $res['Username'];
        } else {
            $usercount = 0;
        }
        if ($usercount > 0) {
            //USER EXISTS CHECK IF ENABLED
            if ($enabled == '1') {
                //CHECK IF PASSWORD IS CORRECT OR NEEDS TO BE RESET
                $sqlQuery = "SELECT [UserID]
                ,[Password]
                ,DATEDIFF(DAY, CreatedDate, GETDATE()) AS 'PasswordAge'
                FROM [DealerOnlineOrderingSystem].[dbo].[DOOS_Passwords]
                WHERE Active = 'TRUE'
                AND UserID = ?";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute(array($userid));
                $res = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                $passwordhash = $res['Password'];
                $passwordage = $res['PasswordAge'];
                if (password_verify($this->password, $passwordhash)) {
                    //VALID PASSWORD

                    //CHECK USERTYPE
                    $sqlQuery = "SELECT [UserID]
                    ,[UserRoleID]
                FROM [DealerOnlineOrderingSystem].[dbo].[DOOS_UserUserRoles] WHERE UserID = ?";
                    $stmt = $this->conn->prepare($sqlQuery);
                    $stmt->execute(array($userid));
                    $res = $stmt->fetch(PDO::FETCH_ASSOC);
                    $stmt->closeCursor();
                    $usertype = $res['UserRoleID'];

                    if ($usertype == "8") {
                        return "notauthorized";
                    } else {
                        //START SESSION
                        if (password_verify($this->username, $passwordhash)) {
                            //DEFAULT PASSWORD DETECTED ASK TO UPDATE PASSWORD
                            //Log in user but redirect to update password page
                            return "defaultpass";
                            //return $employeeid;
                        } else {
                            //PASSWORD IS VALID, CHECK IF EXPIRED
                            if ($passwordage > 90) {
                                //PASSWORD HAS EXPIRED
                                //Log in user but redirect to update password page
                                return "passwordexpired";
                            } else {
                                //PASSWORD IS VALID
                                session_name('doos-admin');
                                session_set_cookie_params([
                                    'path' => '/',
                                    'domain' => $_SERVER['HTTP_HOST'],
                                    'secure' => true,
                                    'httponly' => true,
                                    'samesite' => 'None'
                                ]);
                                session_start(); //
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['userid'] = $userid;
                                $_SESSION['usertype'] = $usertype;
                                return "passwordvalid";
                            }
                        }
                    }
                } else {
                    //INVALID PASSWORD
                    return "invalidpass";
                }
            } else {
                return "disabled";
            }
        } else {
            //USER DOES NOT EXIST
            return "invaliduser";
        }
    }

    public function updatePassword()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $stmt = $db->prepare("SELECT UserID
        FROM   [EmployeesLoanOnlineApplicationSystem].[dbo].[ELOANS_Users]
        WHERE  EmployeeID = ?");
        $stmt->execute(array($this->employeeid));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $userid = $res['UserID'];

        //Deactivate current password
        $sqlQuery = "UPDATE [dbo].[ELOANS_Passwords]
        SET [Active] = 0
        WHERE UserID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($userid));

        //Insert new password
        //CREATE DEFAULT PASSWORD
        $sqlQuery = "INSERT INTO [dbo].[ELOANS_Passwords]
                    ([UserID]
                    ,[Password]
                    ,[Active]
                    ,[CreatedDate]
                    ,[CreatedBy])
              VALUES
                    (?
                    ,?
                    ,1
                    ,GETDATE()
                    ,?)";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($userid, password_hash($this->newpassword, PASSWORD_DEFAULT), $this->currentuser));
        return $stmt;
    }

    public function resetPassword()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $stmt = $db->prepare("SELECT UserID
        FROM   [EmployeesLoanOnlineApplicationSystem].[dbo].[ELOANS_Users]
        WHERE  EmployeeID = ?");
        $stmt->execute(array($this->employeeid));
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $userid = $res['UserID'];

        //Deactivate current password
        $sqlQuery = "UPDATE [dbo].[ELOANS_Passwords]
        SET [Active] = 0
        WHERE UserID = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($userid));

        //Insert new password
        //CREATE DEFAULT PASSWORD
        $sqlQuery = "INSERT INTO [dbo].[ELOANS_Passwords]
                    ([UserID]
                    ,[Password]
                    ,[Active]
                    ,[CreatedDate]
                    ,[CreatedBy])
              VALUES
                    (?
                    ,?
                    ,1
                    ,GETDATE()
                    ,?)";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute(array($userid, password_hash($this->employeeid, PASSWORD_DEFAULT), $this->currentuser));
        return $stmt;
    }
}
