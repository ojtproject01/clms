<?php

declare(strict_types=1);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once dirname(__DIR__, 2) . '\src\config\dbconfig.php';
include_once dirname(__DIR__, 2) . '\src\class\deletedata.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
switch ($requestMethod) {
    case 'POST':
        if ($_GET['mode'] == "salaryHistory") {
            $database = new Database();
            $db = $database->dbConnection();
            $item = new DeleteData($db);
            $data = json_decode(file_get_contents("php://input"));
            $item->id = $data->salaryhistoryid;

            if ($result = $item->deleteSalaryHistory()) {
                echo $result;
            } else {
                echo "failed";
            }
        }

        break;
}
