<!-- Modal for TIME IN -->
<div class="modal fade text-dark" id="timeInModal" tabindex="-1" aria-labelledby="timeInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content card-dark-bg">
            <div class="modal-header cardheader-dark-bg">
                <h5 class="modal-title" id="timeInModalLabel"> <i class="fa-solid fa-computer"></i> Time In for PC <span
                        id="pc_id_name"></span>
                </h5>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger m-0 py-2 mb-3 hidden" id="alertTimeIn"><i
                        class="fas fa-times-circle"></i> Please input the correct srcode!</div>
                <h6 class="mb-4 fw-bold">SRCode Information</h6>
                <div class="row mb-1 ps-3">
                    <!-- SALARY INFO -->
                    <label for="srcodeid" class="col-sm-4 col-form-label">SRCode # <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-7">
                        <div class="input-group mb-3 inputgrp">
                            <span class="input-group-text border-0"><i class="fa-solid fa-qrcode"></i></span>
                            <input type="text" class="form-control" id="srcodeid" required>
                            <button class="btn btn-primary" type="button" id="search-srcode-button"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- PERCENTAGE -->
                <h6 class="mb-4 fw-bold">Student Information</h6>
                <div class="alert alert-danger m-0 py-2 mb-3 hidden" id="alertTimeInInputFields"><i
                        class="fas fa-times-circle"></i> Please make sure these input fields are completely filled out! </div>
                <input type="hidden" id="pc_id"> <!-- FETCH THE ID FOR THIS PC -->
                <div class="col" id="percentageContainer">
                    <div class="row mb-1 ps-3">
                        <label for="timein-lastname" class="col-sm-3 col-form-label">Lastname <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="timein-lastname" class="form-control border-secondary " min="0"
                                required readonly>
                        </div>
                    </div>
                    <div class="row mb-1 ps-3">
                        <label for="timein-firstname" class="col-sm-3 col-form-label">Firstname <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="timein-firstname" class="form-control border-secondary " min="0"
                                required readonly>
                        </div>
                    </div>
                    <div class="row mb-1 ps-3">
                        <label for="savingsTotal" class="col-sm-3 col-form-label">Department <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="timein-department" class="form-control border-secondary " min="0"
                                required readonly>
                        </div>
                    </div>
                    <div class="row mb-1 ps-3">
                        <label for="tithesAmount" class="col-sm-3 col-form-label">Course <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" id="timein-course" class="form-control border-secondary " min="0"
                                required readonly>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="timeInButton" ><i class="fa-regular fa-clock"></i>
                    Time IN</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Add PC-->
<div class="modal fade text-dark" id="addPC" tabindex="-1" aria-labelledby="addPCLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content card-dark-bg">
            <div class="modal-header cardheader-dark-bg">
                <h5 class="modal-title" id="addPCLabel"> <i class="fa-solid fa-computer"></i> Add PC Information <span
                        id="pc_id"></span>
                </h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-0 py-2 mb-3 hidden" id="alertIncompleteFields"></div>
                <h6 class="mb-4 fw-bold">PC Information</h6>
                <div class="row mb-1 ps-3">
                    <div class="col">
                        <!-- PC INFO -->
                        <div class="col-sm-12">
                            <div class="row mb-1 ps-3">
                                <label for="pcnumber" class="col-sm-4 col-form-label">PC # <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" id="pcnumber" class="form-control border-secondary " required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                        class="fa-solid fa-xmark"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="addPCButton" data-bs-dismiss="modal"><i
                        class="fa-solid fa-plus"></i> Add
                    Record</button>
            </div>
        </div>
    </div>
</div>