<?php
require_once "./includes/dbh.php";
require_once './includes/functions.php';
session_start();
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
$student_id = $course_id = $execise_num = $p_title = $aim_objectives = $procedures = $exp_gain =  $problem = $date_time = $attachment = $message = "";

// Check if the user is already logged in
if(!$_SESSION["loggedin"] === true){
    header("Location: login.php");
    exit;
} else {
    $matric_number = $_SESSION['username'];
    $student_data = getStudentInfo($matric_number);
    $student_name = $student_data['fullname'];
    $student_id = $student_data['id'];
    $student_class = $student_data['class'];
    // Student practicals
    $reports = getstudentReport($student_id);
    $class_data = getAllCourses($student_class);
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>E-Practical Report system - Manage Reports</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    Student
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Practicals</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Manage Reports</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedThree"
                    aria-expanded="true" aria-controls="collapsedThree">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Reports</span>
                </a>
                <div id="collapsedThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions</h6>
                        <a class="collapse-item" href="manageReports.php">Manage Practicals</a>
                        <!-- <a class="collapse-item" href="viewUser.php">View Users></a> -->
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $student_name; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <secondarydiv class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="includes/logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </secondarydiv>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800">Manage Report Area</h1>
                        <a href="<?php echo $url; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                            Back</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row mb-5">
                        <div class="card mb-2 col-12 px-0">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Exercise number</th>
                                                <th>Practical title</th>
                                                <th style="width: 80px;">Aim & Objectives</th>
                                                <th>Procedures</th>
                                                <th>Experience gain</th>
                                                <th>Problem encountered</th>
                                                <th>Date time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        if (mysqli_num_rows($reports) > 0) {
                                            foreach ($reports as $report) :?>
                                            <tr>
                                                <td><?php echo $_SESSION['course_code'] ?></td>
                                                <td><?php echo $report['exercise_number'] ?></td>
                                                <td><?php echo $report['practical_title'] ?></td>
                                                <td><?php echo $report['aim_objectives'] ?></td>
                                                <td><?php echo $report['procedures'] ?></td>
                                                <td><?php echo $report['experience_gain'] ?></td>
                                                <td><?php echo $report['problem_encountered'] ?></td>
                                                <td><?php echo $report['date_time'] ?></td>
                                            </tr>
                                            <?php endforeach; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Ready to Leave?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Click "Logout" below if you are ready to end your
                    current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-danger" href="./includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
</body>

</html>