<?php
declare (strict_types = 1);

include('../../src/config/dbconfig.php');
include('../../src/class/users.php');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$requestType = $_SERVER["REQUEST_METHOD"];

switch ($requestType) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        $mode = $data->mode;
        switch($mode){
            case "search_user":
                $database = new Database();
                $db = $database->dbConnection();
                $item = new Users($db);
                $item->srcodeid = $data->srcodeid;
                

                
                if($res = $item->searchUser()){
                    echo json_encode($res);
                }
            break;
        }
        
        
        break;
}
?>