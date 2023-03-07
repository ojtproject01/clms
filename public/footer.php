<!-- Footer Start -->
<div class="footer container-fluid pt-4 px-4">
  <div class="content-dark-bg rounded-top p-4">
    <div class="row">
      <div class="col-12 col-sm-6 text-center text-sm-start">
        &copy; <a href="#">Batangas State University - Malvar</a>, All Right Reserved.
      </div>
      <div class="col-12 col-sm-6 text-center text-sm-end">
        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Designed By <a href="https://htmlcodex.com">Von Sumague</a>
        </br>
      </div>
    </div>
  </div>
  <!-- Footer End -->
</div>
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top hidden" data-bs-trigger="hover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Click to scroll to the top"><i class="fa-solid fa-arrow-up"></i></a>
</div>

</div>
<!-- Content End -->


<!-- IMPORT ALL THE MODALS -->
<?php include("modals.php") ?>

<div class="fixed-plugin ">
  <div class="card shadow-lg card-dark-bg">
    <div class="card-header pb-0 pt-3 ">
      <div class="float-start">
        <h5 class="mt-3 mb-0"> <i class="fa fa-cog"> </i> Settings</h5>
        <p class="text-muted"> <i class="fas fa-info-circle"></i> Under Construction</p>
      </div>
      <div class="float-end mt-4">
        <button class="btn btn-link p-0 fixed-plugin-close-button">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <!-- <hr class="horizontal dark my-1"> -->
    <div class="card-body pt-sm-3 pt-0">
      <!-- Sidebar Backgrounds -->
      <!-- <div>
          <h6 class="mb-0">Theme</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary"
              onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> -->
      <!-- Sidenav Type -->
      <!-- <div class="mt-3">
          <h6 class="mb-0">Sidebar Design</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-dark text-white"
            onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white text-dark"
            onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p> -->
      <h6 class="mb-0 text-secondary">Theme</h6>
      <div class="container p-0 d-flex align-items-center justify-content-between">
        <div class="mt-3">
          <h6 class=""> <i class="fas fa-moon me-2"></i> Dark Mode</h6>
        </div>
        <div class="toggle-pill-dark-mode d-flex align-items-center">
          <input type="checkbox" id="darkModeToggle" name="check" value="0">
          <label for="darkModeToggle"></label>
        </div>
      </div>

      <hr class="horizontal dark my-sm-4">

      <h6 class="mb-0 text-secondary">Change Default Value</h6>
      <div class="accordion custom-accordion" id="accordionExample">
        <div class="accordion-item border-0 bg-transparent">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button border-0 card-dark-bg collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa-solid fa-receipt me-2"></i> Add Salary
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body cardheader-dark-bg rounded">
              <div class="row">
                <div class="col">
                  <div class="card-title text-secondary">Default Values <span id="defaulttotalPercent"></span></div>
                  <div class="alert alert-danger m-0 py-2 mb-3" style="display: none;" id="alertDefaultWrongPercent"> <i class="fa-solid fa-circle-info"></i> Make sure the total is 100%! </div>
                  <div class="alert alert-success m-0 py-2 mb-3" style="display: none;" id="alertDefaultSuccessPercent"> <i class="fa-solid fa-circle-info"></i> Saved Changes! </div>
                  <div class="card-body p-0 px-3">
                    <div class="row mb-1">
                      <label for="expenseBalance" class="col-sm-6 col-form-label p-0 align-self-center">Expense Balance </label>
                      <div class="col-sm-6">
                        <div class="input-group inputgrp">
                          <input type="number" onchange="defaultchange()" id="defaultexpenseBalance" class="form-control" min="0" required>
                          <span class="input-group-text span-right">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="desireBudget" class="col-sm-6 col-form-label p-0 align-self-center">Desire Budget </label>
                      <div class="col-sm-6">
                        <div class="input-group inputgrp">
                          <input type="number" class="form-control"  min="0" onchange="defaultchange()" id="defaultdesireBudget" required>
                          <span class="input-group-text span-right">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="savingsTotal" class="col-sm-6 col-form-label p-0 align-self-center">Savings </label>
                      <div class="col-sm-6">
                        <div class="input-group inputgrp">
                          <input type="number" class="form-control" min="0" onchange="defaultchange()" id="defaultsavingsTotal" required>
                          <span class="input-group-text span-right">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="tithesAmount" class="col-sm-6 col-form-label p-0 align-self-center">Tithes </label>
                      <div class="col-sm-6">
                        <div class="input-group inputgrp">
                          <input type="number" class="form-control" min="0" onchange="defaultchange()" id="defaulttithesAmount" required>
                          <span class="input-group-text span-right">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container mt-3 p-0 d-flex align-items-center justify-content-between">
                      <label for="allowDebtDeductions" class="align-self-center"> Enable Debt Deduction</label>
                    <div class="toggle-pill d-flex align-items-center">
                      <input type="checkbox" id="allowDebtDeductions" onchange="defaultchange()">
                      <label for="allowDebtDeductions"></label>
                    </div>
                  </div>
                  <div class="row">
                    <button class="btn btn-primary mt-3 " style="display: none;" id="addSalaryDefaultButton">Save Changes</button>
                    <button class="btn btn-secondary mt-1 " style="display: none;" id="cancelSalaryDefaultButton">Cancel</button>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- JQUERY -->
<script src="js/includes/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


<!-- Sweet Alert-->
<script src="js/includes/sweetalert2.all.min.js"></script>
<!-- <script src="lib/DataTables/datatables.js"></script> -->

<!-- BS table js -->
<script src="lib/DataTables/datatables/jquery.dataTables.js"></script>
<script src="lib/DataTables/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="lib/DataTables/datatables-responsive/datatables.responsive.js"></script>
<script src="lib/DataTables/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="lib/DataTables/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>
<script src="lib/DataTables/datatables-buttons/datatables-buttons.js"></script>
<script src="lib/DataTables/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
<script src="lib/DataTables/jszip/jszip.js"></script>
<script src="lib/DataTables/pdfmake/pdfmake.js"></script>
<script src="lib/DataTables/datatables-buttons/buttons.html5.js"></script>
<script src="lib/DataTables/datatables-buttons/buttons.print.js"></script>

<script src="js/includes/perfect-scrollbar.min.js"></script>
<script src="js/includes/smooth-scrollbar.min.js"></script>
<script src="js/includes/topbarloading.js"></script>

<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/includes/soft-ui-dashboard.js?v=1.0.6"></script>

<!-- Template Javascript -->
<script src="js/custom/general.js"></script>
<script src="js/custom/main.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/salaryHistory.js"></script>
<script src="js/manageSalary.js"></script>
<script src="js/custom/darkmode.js"></script>
<script src="js/custom/defaultvalue.js"></script>
<script src="js/custom/constants.js"></script>
<script src="js/custom/alert.js"></script>
<script src="js/custom/time.js"></script>
</body>

</html>