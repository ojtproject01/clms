<?php
session_start();
$currentpage = "Salary History";
include("header.php");
include("navbar.php");

$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$userid = $_SESSION['userid'];
if (empty($userid)) {
  header("location: index.php");
}
?>
<div class="card m-3 card-dark-bg">
  <div class="card-datatable table-responsive shadow">
    <table class="table-dark-bg  datatables-basic table border-top dataTable no-footer dtr-column collapsed" id="salaryHistoryTable">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>Salary Amount</th>
          <th>Date</th>
          <th>Expense Balance</th>
          <th>Desire Budget</th>
          <th>Savings</th>
          <th>Tithes</th>
          <th>Debt Deduction</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>





<?php
include("footer.php");

?>