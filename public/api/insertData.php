<?php

declare(strict_types=1);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json, text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once dirname(__DIR__, 2) . '\src\config\dbconfig.php';
include_once dirname(__DIR__, 2) . '\src\class\insertdata.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
switch ($requestMethod) {
    case 'POST':
        if ($_GET['mode'] == "insertsalaryhistory") {
            $database = new Database();
            $db = $database->dbConnection();
            $item = new InsertData($db);
            $data = json_decode(file_get_contents("php://input"));
            $item->salary_amount = $data->salary_amount;
            $item->salary_date = $data->salary_date;
            $item->expense_balance = $data->expense_balance;
            $item->desire_budget = $data->desire_budget;
            $item->savings_total = $data->savings_total;
            $item->tithes_amount = $data->tithes_amount;
            $item->debt_deduction = $data->debt_deduction;
            $item->user_id = $data->user_id;

            $stmt = $item->insertSalaryHistory();
            http_response_code(200);
            echo json_encode($stmt);
        }

        break;
}