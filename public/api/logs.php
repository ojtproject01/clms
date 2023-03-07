<?php
declare (strict_types = 1);

include('../../src/config/dbconfig.php');
include('../../src/class/logs.php');

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
            case "timein_logs":
                $database = new Database();
                $db = $database->dbConnection();
                $item = new Logs($db);
                $item->srcodeid = $data->srcodeid;
                $item->pc_id = $data->pc_id;
                $item->currentDateTime = $data->currentDateTime;

                
                if($res = $item->timeInLogs()){
                    echo $res;
                }
            break;
            case "timeout_logs":
                $database = new Database();
                $db = $database->dbConnection();
                $item = new Logs($db);
                $item->pc_id = $data->pc_id;

                
                if($res = $item->timeOutLogs()){
                    echo $res;
                }
            break;
        }
        
        
        break;
}
?>