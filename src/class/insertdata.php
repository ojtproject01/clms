<?php
class InsertData
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function insertSalaryHistory()
    {
        //FIRST LETS CHECK IF THE SALARY DATE IS ALREADY EXISTING IN THE DATABASE
        $checkDuplicateSalaryHistory = "SELECT [UserID], [Salary_Date]
                                        FROM [iponDB].[dbo].[IPON_Salary_History]
                                        WHERE [UserID] = ? AND [Salary_Date] = ?";
        $stmtCheckDuplicate = $this->conn->prepare($checkDuplicateSalaryHistory);
        $stmtCheckDuplicate->execute(array($this->user_id, $this->salary_date));
        if ($stmtCheckDuplicate->fetchColumn() > 0) {
            //IF EXISTING, RETURN AS ALREADY EXIST
            return 'This Salary Date is already existing in the database';
        } else {
            //IF NO, NEXT IS FETCH THE ACTIVE IN SALARY BUDGETING
            //TO SUM THE EXCESS MONEY
            $fetchActiveSalaryBudgeting = "SELECT [UserID]
                ,[Salary_Date]
                ,[Expense_Balance]
                ,[Desire_Budget]
                ,[ExcessMoney]
                ,[Savings_Total]
                ,[Status]
            FROM [iponDB].[dbo].[IPON_Salary_Budgeting]
            WHERE [UserID] = ? AND [Status] = ?";
            $stmtFetchActive = $this->conn->prepare($fetchActiveSalaryBudgeting);
            $stmtFetchActive->execute(array(
                $this->user_id, 1
            ));
            $resultFetchActive = $stmtFetchActive->fetch(PDO::FETCH_ASSOC);

            if ($resultFetchActive) {
                //IF THERE"S AN EXISTING DATA THEN FIND THE SUM OF EXPENSE BALANCE, DESIRE BUDGET AND EXCESS MONEY
                $previousExpenseBalance = $resultFetchActive['Expense_Balance'];
                $previousDesireBudget = $resultFetchActive['Desire_Budget'];
                $previousExcessMoney = $resultFetchActive['ExcessMoney'];
                $previousSavingsTotal = $resultFetchActive['Savings_Total'];
                $totalExcessMoney = $previousExpenseBalance + $previousDesireBudget + $previousExcessMoney;
                $totalSavingsTotal = $previousSavingsTotal + $this->savings_total;
                //AFTER SUMMING THE EXCESS MONEY, UPDATE THE ACTIVE AS INACTIVE
                $updateActiveSalaryBudget = "UPDATE [dbo].[IPON_Salary_Budgeting]
                SET [Status] = 0
              WHERE [UserID] = ? AND [Status] = ?";
                $stmtupdateActiveSalaryBudget = $this->conn->prepare($updateActiveSalaryBudget);
                $stmtupdateActiveSalaryBudget->execute(array(
                    $this->user_id, 1
                ));
                if(!$stmtupdateActiveSalaryBudget){
                    return "failed";
                }
            } else {
                $totalExcessMoney = 0;
                $totalSavingsTotal = $this->savings_total;
            }

            $insertSalary_query = "INSERT INTO [dbo].[IPON_Salary_History]
            ([UserID]
            ,[Salary_Amount]
            ,[Salary_Date]
            ,[Expense_Balance]
            ,[Desire_Budget]
            ,[Savings_Total]
            ,[Tithes]
            ,[Debt_Deduction]
            ,[IsDeleted]
            ,[CreatedDate]
            ,[LastUpdatedDate])
      VALUES
            (?
            ,?
            ,?
            ,?
            ,?
            ,?
            ,?
            ,?
            ,0
            ,GETDATE()
            ,NULL)";
            $stmtInsertSalary = $this->conn->prepare($insertSalary_query);
            $stmtInsertSalary->execute(array(
                $this->user_id,
                $this->salary_amount,
                $this->salary_date,
                $this->expense_balance,
                $this->desire_budget,
                $this->savings_total,
                $this->tithes_amount,
                $this->debt_deduction
            ));
            if ($stmtInsertSalary) {

                $getlastID = "SELECT IDENT_CURRENT('IPON_Salary_History') AS RecentInsert";
                $stmtgetlastID = $this->conn->prepare($getlastID);
                $stmtgetlastID->execute();
                $resultgetlastID = $stmtgetlastID->fetch(PDO::FETCH_ASSOC);
                $lastID = $resultgetlastID["RecentInsert"];

                $insertSalaryBudgeting_query = "INSERT INTO [dbo].[IPON_Salary_Budgeting]
                ([UserID]
                ,[Salary_HistoryID]
                ,[Salary_Date]
                ,[Expense_Balance]
                ,[Desire_Budget]
                ,[Savings_Total]
                ,[Tithes]
                ,[ExcessMoney]
                ,[Status]
                ,[CreatedDate])
        VALUES
                (?
                ,?
                ,?
                ,?
                ,?
                ,?
                ,?
                ,?
                ,1
                ,GETDATE())";
                $stmtInsertSalaryBudgetting = $this->conn->prepare($insertSalaryBudgeting_query);
                $stmtInsertSalaryBudgetting->execute(array(
                    $this->user_id,
                    $lastID,
                    $this->salary_date,
                    $this->expense_balance,
                    $this->desire_budget,
                    $totalSavingsTotal,
                    $this->tithes_amount,
                    $totalExcessMoney
                ));
                if ($stmtInsertSalaryBudgetting) {
                    return "success";
                } else {
                    return "failed";
                }
            } else {
                return "Failed";
            }
        }
    }


}