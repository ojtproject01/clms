<?php
session_start();
$currentpage = "Manage Salary";
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

<!-- Demo header-->
<section class="pb-5 pt-2 header ">
  <div class="container pb-4">
    <header class="text-center mb-2 py-2  text-white cardheader-dark-bg rounded">
      <h3 class="m-0">Bootstrap vertical tabs</h3>
    </header>
    <div class="row">
      <div class="col-md-2">
        <!-- Tabs nav -->
        <div class="nav flex-column nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link icon-dark-bg mb-3 p-3 shadow active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
            <i class="fa fa-user-circle-o mr-2"></i>
            <span class="font-weight-bold small text-uppercase">Deductions</span></a>

          <a class="nav-link icon-dark-bg mb-3 p-3 shadow" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
            <i class="fa fa-calendar-minus-o mr-2"></i>
            <span class="font-weight-bold small text-uppercase">Transfer</span></a>

          <a class="nav-link icon-dark-bg mb-3 p-3 shadow" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
            <i class="fa fa-star mr-2"></i>
            <span class="font-weight-bold small text-uppercase">Additional</span></a>

          <a class="nav-link icon-dark-bg mb-3 p-3 shadow" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            <i class="fa fa-check mr-2"></i>
            <span class="font-weight-bold small text-uppercase">Confirm booking</span></a>
        </div>
      </div>


      <div class="col-md-10">
        <!-- Tabs content -->
        <div class="tab-content " id="v-pills-tabContent">
          <div class="tab-pane card-dark-bg fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <h4 class="font-italic mb-4">Deductions</h4>
            <div class="row mb-3">
              <div class="col-3">
                Expense Balance
              </div>
              <div class="col-9 d-flex ">
                <div class="search-box expensededuct">
                  <button class="btn-search"><i class="fa-solid fa-circle-minus"></i></button>
                  <input type="number" min="0" class="input-search" placeholder="Input an amount">
                </div>

                <p class="align-self-center m-0 mx-3">P 123.00</p>

                <button class="btn btn-primary rounded px-3 py-1 test" ><i class="fa-solid fa-chevron-right"></i></button>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-3">
                Desire Budget
              </div>
              <div class="col-4">
                <div class="search-box desirededuct">
                  <button class="btn-search"><i class="fa-solid fa-circle-minus"></i></button>
                  <input type="number" min="0" class="input-search" placeholder="Input an amount">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-3">
                Total Savings
              </div>
              <div class="col-4">
                <div class="search-box savingsdeduct">
                  <button class="btn-search"><i class="fa-solid fa-circle-minus"></i></button>
                  <input type="number" min="0" class="input-search" placeholder="Input an amount">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-3">
                Excess Money
              </div>
              <div class="col-4">
                <div class="search-box excessdeduct">
                  <button class="btn-search"><i class="fa-solid fa-circle-minus"></i></button>
                  <input type="number" min="0" class="input-search" placeholder="Input an amount">
                </div>
              </div>
            </div>

          </div>

          <div class="tab-pane card-dark-bg fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h4 class="font-italic mb-4">Bookings</h4>
            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <div class="tab-pane card-dark-bg fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <h4 class="font-italic mb-4">Reviews</h4>
            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <div class="tab-pane card-dark-bg fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <h4 class="font-italic mb-4">Confirm booking</h4>
            <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<?php
include("footer.php");

?>