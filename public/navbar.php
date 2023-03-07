<?php
session_start();
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$userid = $_SESSION['userid'];
if (empty($userid)) {
    header("location: index.php");
}
?>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 navbar-dark-bg">
    <nav class="navbar bg-transparent">
        <div class="navbar-header">
            <img src="img/bsu-lg.png" alt="">
            <a href="dashboard.php" class="navbar-brand mx-4 mb-0">
                <h2 class="text-primary fw-bold">CLMS</h2>
            </a>
            <small>Computer Laboratory Management System</small>
        </div>
        <div class="divider"></div>
        <div class="d-flex align-items-center ms-4 mb-4" style="cursor: pointer;">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo $fullname ?></h6>
                <span>Admin</span>
            </div>
        </div>


        <div class="navbar-nav w-100">
            <a href="dashboard.php"
                class="nav-item nav-link <?php echo $currentpage == "Dashboard" ? "active" : null; ?>"><i
                    class="icon-dark-bg fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="icon-dark-bg fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0 ">
                    <a href="button.php" class="dropdown-item text-light">Buttons</a>
                    <a href="typography.php" class="dropdown-item text-light">Typography</a>
                    <a href="element.php" class="dropdown-item text-light">Other Elements</a>
                </div>
            </div> -->
            <!-- <a href="widget.php" class="nav-item nav-link "><i class="icon-dark-bg fa fa-th me-2"></i>Widgets</a>
            <a href="form.php" class="nav-item nav-link "><i class="icon-dark-bg fa fa-keyboard me-2"></i>Forms</a> -->
            <a href="salaryHistory.php"
                class="nav-item nav-link <?php echo $currentpage == "Salary History" ? "active" : null; ?>"><i
                    class="icon-dark-bg fa-solid fa-money-bills me-2"></i>Salary History</a>
            <a href="manageSalary.php"
                class="nav-item nav-link <?php echo $currentpage == "Manage Salary" ? "active" : null; ?>"><i
                    class="icon-dark-bg fa-solid fa-hand-holding-dollar me-2"></i> Manage Salary</a>
            <!-- <a href="chart.php" class="nav-item nav-link "><i class="icon-dark-bg fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"><i class="icon-dark-bg far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.php" class="dropdown-item">Sign In</a>
                    <a href="signup.php" class="dropdown-item">Sign Up</a>
                    <a href="404.php" class="dropdown-item">404 Error</a>
                    <a href="blank.php" class="dropdown-item">Blank Page</a>
                </div>
            </div> -->

            <!-- <label for="darkModeToggle" class="nav-item nav-link d-flex justify-content-between align-items-center">
                <label class="m-0" for="darkModeToggle"><i class="icon-dark-bg fa-solid fa-moon me-2"></i> Dark Mode</label>
                <div class="toggle-pill-dark d-flex align-items-center">
                    <input type="checkbox" id="darkModeToggle" name="check" value="0">
                    <label for="darkModeToggle"></label>
                </div>
            </label> -->
        </div>
    </nav>
</div>
<!-- Sidebar End -->


<!-- Content Start -->
<div class="content content-dark-bg">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand  sticky-top px-4 py-0 navbar-dark-bg">
        <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa-solid fa-piggy-bank"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa-solid fa-bars-staggered"></i>
        </a>
        <div id="dateTime">
        
        </div>
        
        <div class="navbar-nav align-items-center ms-auto ">
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificatin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Profile updated</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New user added</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Password changed</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div> -->


            <div class="nav-item dropdown ">
                <a href="#" class="nav-link dropdown-toggle ms-3" data-bs-toggle="dropdown">
                    <img class="rounded-circle " src="img/user.png" alt="" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 ">
                    <a href="#" class="dropdown-item">My Profile</a>
                    <a href="javascript:;" class="dropdown-item fixed-plugin-button-nav cursor-pointer"><i
                            class="fa fa-cog text-dark" aria-hidden="true"></i> Settings</a>
                    <a href="#" class="dropdown-item" id="logoutbttn"><i class="fa-solid fa-right-from-bracket"></i> Log
                        Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->