<?php
session_start();
include("koneksi.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAS PWEB - Christopher Baptista</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/color/48/000000/story-book.png"/>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a  href="#">
                <img id="logo" class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" src="https://www.its.ac.id/wp-content/uploads/2020/07/Logo-ITS-1-300x185.png" alt="logo">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <!-- Admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="overview.php">
                            <i class="bi bi-pie-chart-fill"></i> Overview
                        </a>
                    </li>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="teachers.php">
                                <i class="bi bi-person-badge"></i> Teachers
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">
                                <i class="bi bi-people"></i> Students
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="parents.php">
                                <i class="bi bi-people-fill"></i> Parents
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("admin", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="epayslip.php">
                                <i class="bi bi-wallet2"></i> E-Payslip
                            </a>
                        </li>
                    <?php } ?>
                    
                    <!-- Teacher -->
                    <?php if (in_array("guru", $_SESSION['admin_akses']) || in_array("siswa", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="exam.php">
                                <i class="bi bi-pen"></i> Exam
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("guru", $_SESSION['admin_akses']) || in_array("siswa", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="assignment.php">
                                <i class="bi bi-pencil-square"></i> Assignment
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="classroom.php">
                                <i class="bi bi-chat-dots"></i> Classroom
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="attendance.php">
                                <i class="bi bi-check-square"></i> Attendance
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("guru", $_SESSION['admin_akses']) || in_array("siswa", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="course.php">
                                <i class="bi bi-book"></i> Course
                            </a>
                        </li>
                    <?php } ?>
                    
                    <!-- Student -->
                    <?php if (in_array("siswa", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="timetable.php">
                                <i class="bi bi-calendar-date"></i> Timetable
                            </a>
                        </li>
                    <?php } ?>
                    
                    <!-- Parent -->
                    <?php if (in_array("parent", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="credentials.php">
                                <i class="bi bi-file-earmark-medical"></i> Credentials
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("parent", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="invoice.php">
                                <i class="bi bi-cash"></i> Invoice
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (in_array("parent", $_SESSION['admin_akses'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="payment.php">
                                <i class="bi bi-credit-card"></i> Payment
                            </a>
                        </li>
                    <?php } ?>
                    
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="setting.php">
                            <i class="bi bi-gear"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
</body>
</html>