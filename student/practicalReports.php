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
    $class_data = getAllCourses($student_class);

    if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['submit'])) {
        $course_id = $_SESSION['course_id'];
        $execise_num = trim($_POST['exercise_number']); 
        $p_title = trim($_POST['title']);
        $aim_objectives = "AIM: ".trim($_POST['aim'])."OBJECTIVES: ".trim($_POST['objectives']);
        $procedures = trim($_POST['procedures']);
        $exp_gain = trim($_POST['experience']); 
        $problem = trim($_POST['problems']);
        $date_time = trim($_POST['p_date'])." (".trim($_POST['p_time']).")";

        if (!empty($_FILES['attachment']['name'])) {
            
            $attachment = $_FILES['attachment']['name'];
            $file_tmp = $_FILES['attachment']['tmp_name'];
            if (move_uploaded_file($file_tmp, "../Admin/reports/".$attachment)) {
               // Upload the practical reports
                $message = uploadReports($student_id, $course_id, $execise_num, $p_title, $aim_objectives, $procedures, $exp_gain, $problem, $date_time, $attachment);
            } else {
                $message = "<span class='text-warning'>Error uploading attachments</span>";
            }
        } else {
            $message = "<span class='text-warning'>Attachment cannot be empty</span>";
        }
    }
    
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

    <title>E-Practical Report system - Practical Reports</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Practical Report Area</h1>
                        <a href="<?php echo $url; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                            Back</a>
                    </div>
                    <?php echo $message; ?>

                    <!-- Content Row -->
                    <div class="row mb-5">
                        <div class="card mb-2 col-12 px-0">
                            <div class="card-header py-2">
                                <h6 class="font-weight-bold text-primary">
                                    Adhere to the practical rules & regulations
                                </h6>
                            </div>
                            <div class="card-body">
                                <form class="form mt-2" method="POST"
                                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="pdate" class="form-control-text">Practical Date</label>
                                                    <input class="form-control" name="p_date" type="date" id="pdate"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ptime" class="form-control-text">Practical Time</label>
                                                    <input class="form-control" name="p_time" type="time" id="ptime"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exec" class="form-control-text">Exercise Number</label>
                                            <input class="form-control" name="exercise_number" type="number" id="exec"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title" class="form-control-text">Exercise Title</label>
                                            <input class="form-control" name="title" type="text" id="title" require>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="form-group col-md-6">
                                            <div class="mb-2">
                                                <label for="aim" class="form-control-text">Aim of Exercise</label>
                                                <input class="form-control" name="aim" type="text" id="aim" required>
                                            </div>
                                            <div class="">
                                                <label for="objective" class="form-control-text">Objectives of
                                                    Exercise</label>
                                                <textarea name="objectives" class="form-control" id="objective"
                                                    cols="10" rows="5" required>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="procedures" class="form-control-text">Procedures</label>
                                            <textarea name="procedures" class="form-control" id="procedures" cols="10"
                                                rows="8" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="experience" class="form-control-text">Experience Gain</label>
                                            <textarea name="experience" class="form-control" id="experience" cols="10"
                                                rows="5" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="problems" class="form-control-text">Problems
                                                Encountered</label>
                                            <textarea name="problems" class="form-control" id="problems" cols="10"
                                                rows="5" required>
                                            </textarea>
                                        </div>practical_report
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="atata" class="form-control-text">Upload Attachment</label>
                                            <input type="file" class="form-control" name="attachment" id="atata">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="submit" value="Submit" name="submit"
                                                class="btn btn-primary col-12">
                                        </div>
                                    </div>
                                </form>
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