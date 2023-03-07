<?php

declare(strict_types=1);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once dirname(__DIR__, 2) . '\src\config\dbconfig.php';
include_once dirname(__DIR__, 2) . '\src\class\getdata.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
switch ($requestMethod) {
    case 'GET':
        switch ($_GET['mode']) {
            case "salaryHistory":
                $database = new Database();
                $db = $database->dbConnection();
                $item = new GetData($db);
                $stmt = $item->salaryHistory();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                http_response_code(200);
                echo json_encode($res);
                break;
        }

        break;

    case "POST":
    case "salaryBudgetingActive":
        $database = new Database();
        $db = $database->dbConnection();
        $item = new GetData($db);
        $data = json_decode(file_get_contents("php://input"));
        $item->user_id = $data->user_id;
        $stmt = $item->salaryBudgetngActive();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode($res);
        break;
        break;
}
