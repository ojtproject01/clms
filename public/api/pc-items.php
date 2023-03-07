<?php
declare (strict_types = 1);

include('../../src/config/dbconfig.php');
include('../../src/class/pc-items.php');

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
            case "display_pc":
                $database = new Database();
                $db = $database->dbConnection();
                $item = new PC($db);

                if($res = $item->fetchPCItems()){
                    echo json_encode($res);
                }
                break;

                case "count_pc":
                    $database = new Database();
                    $db = $database->dbConnection();
                    $item = new PC($db);
    
                    if($res = $item->fetchTotalItems()){
                        echo json_encode($res);
                    }
                    break;
                
                case "add_pc":
                    $database = new Database();
                    $db = $database->dbConnection();
                    $item = new PC($db);
                    $item->pc_number = $data->pc_number;

                    if($res = $item->addPC()){
                        echo $res;
                    }
                    break;
                case "display_list":
                        $database = new Database();
                        $db = $database->dbConnection();
                        $item = new PC($db);
    
                        if($res = $item->listPC()){
                            echo json_encode($res);
                        }
                        break;
                
        }
        
        
        break;
}