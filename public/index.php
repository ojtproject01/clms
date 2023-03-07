<?php 
session_start();
$currentpage = 'Login Page';
include("header.php");

if (isset($userid)) {
    header("location: dashboard.php");
}

?>
<!-- Sign In Start -->
<div class="container-fluid pt-4 px-4 content-dark-bg">
    <div class="login-card-container">
        <div class="login-card-outside">
            <div class="login-card card-dark-bg" data-aos="flip-left">
                <div class="login-card-logo">
                    <img src="img/bsu-lg.png" alt="logo">
                    <p>Batangas State University</p>
                </div>
                <div class="login-card-header">
                    <h1>CLMS</h1>
                    <h5>Computer Laboratory Management System</h5>

                </div>

                <div class="login-card-form">
                    <div class="form-item">
                        <input type="text" placeholder="Enter Username" id="username" autofocus required>
                        <span class="form-item-icon"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <div class="form-item">
                        <input type="password" placeholder="Enter Password" id="password" required>
                        <span class="form-item-icon"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <button id="loginbttn"><span><span><i class="fas fa-info-circle"></i> Incomplete
                                fields</span></span></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->

<!-- JavaScript Libraries -->
<script src="js/includes/jquery-3.5.1.min.js"></script>

<script src="js/includes/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Constants variable  JAVASCRIPT -->
<script src="js/custom/constants.js"></script>

<!--  Font Awesone -->
<script src="js/includes/all.min.js"></script>

<!-- Sweet Alert-->
<script src="js/includes/sweetalert2.all.min.js"></script>
<!-- Template Javascript -->
<script src="js/index.js"></script>
<script src="js/custom/main.js"></script>

<!-- ALERT JAVASCRIPT -->
<script src="js/custom/alert.js"></script>
</body>

</html>