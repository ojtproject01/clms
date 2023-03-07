<?php
session_start();
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
<div class="card m-3">
  <div class="text-white card-datatable table-responsive">
    <table class="datatables-basic table border-top dataTable no-footer dtr-column collapsed">
      <thead >
        <tr >
          <th ></th>
          <th></th>
          <th>id</th>
          <th >Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Salary</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>



<?php
include("footer.php");

?>