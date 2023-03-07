<?php

class GetData
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function salaryHistory()
    {
        //GET THE HISTORY P|OF SALARY
        $salaryHistory_query = "SELECT [RecordID]
        ,[Salary_Amount]
        ,[Salary_Date]
        ,[Expense_Balance]
        ,[Desire_Budget]
        ,[Savings_Total]
        ,[Tithes]
        ,[IsDeleted]
        ,[Debt_Deduction]
    FROM [iponDB].[dbo].[IPON_Salary_History]
    WHERE [IsDeleted] = ? ";
        $stmt = $this->conn->prepare($salaryHistory_query);
        $stmt->execute(array(0));
        if ($stmt) {
            return $stmt;
        } else {
            return "Failed";
        }
    }

    public function salaryBudgetngActive()
    {
        //GET THE HISTORY P|OF SALARY
        $salaryBusgetingActive = "SELECT Expense_Balance, Desire_Budget, Savings_Total, Tithes, ExcessMoney 
        FROM IPON_Salary_Budgeting WHERE UserID = ? AND status = ?";
        $stmt = $this->conn->prepare($salaryBusgetingActive);
        $stmt->execute(array($this->user_id, 1));
        if ($stmt) {
            return $stmt;
        } else {
            return "Failed";
        }
    }
}
