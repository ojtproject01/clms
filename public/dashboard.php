<?php
$currentpage = "Dashboard";
include("header.php");
include("navbar.php");

if (empty($userid)) {
    header("location: index.php");
}
?>


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3 ">
            <div class="card-dark-bg card-light-bg rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-computer fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Computer</p>
                    <h2 class="mb-0 fw-bold" id="totalcomputer">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-dark-bg card-light-bg rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-plug-circle-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Available Computer</p>
                    <h2 class="mb-0 fw-bold" id="availablecomputer">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-dark-bg card-light-bg rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-plug-circle-xmark fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Occupied Computer</p>
                    <h2 class="mb-0 fw-bold" id="occupiedcomputer">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-dark-bg card-light-bg rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Admin</p>
                    <h2 class="mb-0 fw-bold" id="displayExcessMoney">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="card">
        <div class="card-header bg-light cardheader-dark-bg d-flex justify-content-between px-4 py-3">
            <div>
                <h5 class="card-title mb-0">Computer Management</h5>
            </div>
            <div class="d-flex ">
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#addPC">
                    <i class="fa-solid fa-computer"></i> <span>Add Computer</span>
                </button>

                <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal"
                    data-bs-target="#timeOutAll"> <i class="fa-solid fa-plug-circle-xmark"></i> <span>Time Out
                        All</span></button>

                <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#PCManagement">
                <i class="fa-solid fa-network-wired"></i> <span>PC Management</span>
                </button>

            </div>


        </div>
        <div class="row g-4">
            <div class="col-xl-12">
                <div class="card-dark-bg text-center p-4">
                    <div class="row" id="pc-card-container">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<?php
include("footer.php");

?>