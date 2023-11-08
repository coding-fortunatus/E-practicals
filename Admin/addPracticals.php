<?php
require_once "./includes/dbh.php";
require_once "./includes/functions.php";
// echo exec('whoami');
session_start();
$course_code_error = $practical_manual_error = $class_error = $create_error = $practical_num_error = "";
$course_code = $practical_number = $class = $practical_manual = $success = "";
// Check if the user is already logged in
if(!$_SESSION["loggedin"] === true){
    header("Location: login.php");
    exit;
} else {
    $name = $_SESSION['username'];
    $lecturer_data = getLecturerInfo($name);
    $lecturer_name = $lecturer_data['fullname'];
    $lecturer_id = $lecturer_data['id'];
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['addPractical']) {
        // Validate form datas
        if (empty($_POST['course_code'])) {
            $course_code_error = "Field cannot be empty";
            $create_error = "Invalid practical info given";
        } else {
            $course_code = trim($_POST['course_code']);
        }

        if (empty($_POST['practical_numbers'])) {
            $practical_num_error = "Field cannot be empty";
            $create_error = "Invalid practical info given";
        } else {
            $practical_number = trim($_POST['practical_numbers']);
        }

        if (empty($_POST['class'])) {
            $class_error = "Field cannot be empty";
            $create_error = "Invalid practical info given";
        } else {
            $class = trim($_POST['class']);
        }
        // Process the form datas for insertion into the database
        if (!empty($_FILES['practical_manual']['name']) 
            && empty($course_code_error) && empty($practical_num_error) 
            && empty($class_error) && empty($create_error)) {
            
            $practical_manual = $_FILES['practical_manual']['name'];
            $file_tmp = $_FILES['practical_manual']['tmp_name'];
            move_uploaded_file($file_tmp, "manuals/".$practical_manual);

            $check = "SELECT * FROM course_practicals WHERE course_code = '$course_code'";
            $result = mysqli_query($conn, $check);
            if (mysqli_num_rows($result) > 0) {
                $update = "UPDATE course_practicals SET class = '$class', practical_number = $practical_number, practical_manual = '$practical_manual' WHERE course_code = '$course_code'";
                if (mysqli_query($conn, $update)) {
                    $success = "Course practical info updated successfully";
                } else {
                    $create_error = "Oops! An error occured why updating course practical info";
                }
            } else {
                $insert = "INSERT INTO course_practicals(lecturer_id, course_code, class, practical_number, practical_manual)VALUES('$lecturer_id', '$course_code', '$class', $practical_number, '$practical_manual')";
                if (mysqli_query($conn, $insert)) {
                    $success = "Course practical added successfully";
                } else {
                    $create_error = "Oops! An error occured why adding course practical";
                }
            }
        } else {
            $create_error = "Invalid file supplied";
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

    <title>E-Practical Report system - Manage Practicals</title>

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
                    Lecturer
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Manage Practicals</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Practicals</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions</h6>
                        <a class="collapse-item" href="addPracticals.php">Add practical</a>
                        <a class="collapse-item" href="viewPracticals.php">View practicals</a>
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
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $lecturer_name; ?></span>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Create Practical</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row mb-5 justify-content-center">
                        <div
                            class="card col-md-8 o-hidden border-0 shadow-lg border-left-warning border-bottom-primary">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div class="p-5">
                                    <div class="">
                                        <h1 class="h4 text-gray-900 mb-4">Add new practical</h1>
                                        <div class="text-center">
                                            <span class="text-success"><?php echo $success; ?></span>
                                            <span class="text-danger"><?php echo $create_error; ?></span>
                                        </div>
                                    </div>
                                    <form class="form mt-2" method="POST"
                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="ccode" class="form-control-text">Course code</label>
                                                <input class="form-control" name="course_code" type="text" id="ccode">
                                                <span class="text-danger"><?php echo $course_code_error; ?></span>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="pracricalNumbers" class="form-control-text">Number of
                                                    practical</label>
                                                <input class="form-control" name="practical_numbers" min="2"
                                                    type="number" id="pracricalNumbers">
                                                <span class="text-danger"><?php echo $practical_num_error; ?></span>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="class" class="form-control-text">Select class</label>
                                                <select name="class" id="class" class="form-select form-control">
                                                    <option></option>
                                                    <option value="ND1">ND I</option>
                                                    <option value="ND2">ND II</option>
                                                    <option value="HND1">HND I</option>
                                                    <option value="HND2">HND II</option>
                                                </select>
                                                <span class="text-danger"><?php echo $class_error; ?></span>
                                            </div>
                                            <div class="form-group col-8">
                                                <label for="fileupload" class="form-control-text">Practical
                                                    manual</label>
                                                <input class="form-control" name="practical_manual" type="file"
                                                    id="fileupload" accept=".pdf">
                                                <span class="text-danger"><?php echo $practical_manual_error; ?></span>
                                            </div>
                                            <input type="submit" name="addPractical" value="Add practical"
                                                class="btn btn-primary btn-user btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HND II FINAL YEAR PROJECT
                            2023</span>
                    </div>
                    <div class="copyright text-center text-info my-auto">
                        <span>Developer <a href="#" class="text-info" target="_blank">Fortunatus</a></span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->
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