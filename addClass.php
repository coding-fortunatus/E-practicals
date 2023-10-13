<?php
require_once './includes/dbh.php';
session_start();
$class = $fullname = $mat_number = $email = $phone_number = $session = $program_type = $success = $students = $file_upload_error = $password = $class_error = "";
$password = "123456789";
$password = password_hash($password, PASSWORD_DEFAULT);
// Check if the user is already logged in
if(!$_SESSION["loggedin"] === true){
    header("Location: login.php");
    exit;
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['student_upload'])) {
        if (empty($_POST['class'])) {
            $class_error = "Field cannot be empty";
            $file_upload_error = "All fields were not filled";
        } else {
            $class = trim($_POST['class']);
        }
        // Allowed mime types
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['students']['name']) && in_array($_FILES['students']['type'], $fileMimes)) {
            // Open uploaded CSV file with read-only mode
            $StudentCsv = fopen($_FILES['students']['tmp_name'], 'r');
            // Skip the first line
            fgetcsv($StudentCsv);
            // Parse data from CSV file line by line
            while (($studentData = fgetcsv($StudentCsv, 10000, ",")) !== FALSE) {
                // Get row data
                $mat_number = $studentData[0];
                $fullname = $studentData[1];
                $email = $studentData[2];
                $phone_number = $studentData[3];
                $session = $studentData[4];
                $program_type = $studentData[5];

                // If student already exists in the database with the same matric number
                $query = "SELECT * FROM classes WHERE matric_number = '$mat_number'";
                $check = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($check);
                if (mysqli_num_rows($check) > 0) {
                    $sql = "UPDATE classes SET fullname = '$fullname', phone_number = '$phone_number', email = '$email', session = '$session', program_type = '$program_type', class = '$class' WHERE matric_number = '$mat_number'";
                    if (mysqli_query($conn, $sql)) {
                        $update = "UPDATE users SET password = '$password' WHERE username = '$mat_number'";
                        if (mysqli_query($conn, $update)) {
                            $success = "Student info successfully updated";
                        }
                    }
                } else {
                    $sql = "INSERT INTO 
                    classes(fullname, matric_number, phone_number, email, session, program_type, class)
                    VALUES('$fullname', '$mat_number', '$phone_number', '$email', '$session', '$program_type', '$class')";
                    if (mysqli_query($conn, $sql)) {
                        $create = "INSERT INTO users(username, password)VALUES('$mat_number', '$password')";
                        if (mysqli_query($conn, $create)) {
                            $success = "Students info successfully uploaded";
                        }
                    } else {
                        $file_upload_error = "Oops! An error occured";
                    }
                }
            }
            // Close opened CSV file
            fclose($StudentCsv);
        } else {
            $file_upload_error = "Please select valid file";
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

    <title>E-Practical Report system - Manage Class</title>

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
                    E-practical Manager
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
            <div class="sidebar-heading">Manage Class</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Classes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions</h6>
                        <a class="collapse-item" href="addClass.php">Add Class</a>
                        <a class="collapse-item" href="viewClass.php">View Class</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Manage Lecturer</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Lecturers</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions</h6>
                        <a class="collapse-item" href="addLecturer.php">Add Lecturer</a>
                        <a class="collapse-item" href="viewLecturer.php">View Lecturers</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Manage Users</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedThree"
                    aria-expanded="true" aria-controls="collapsedThree">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapsedThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Actions</h6>
                        <a class="collapse-item" href="addUser.php">Add Users</a>
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
        <!-- End of Sidebar -->

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Department Admin</span>
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
                                <a class="dropdown-item" href="./includes/logout.php" data-toggle="modal"
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
                        <h1 class="h3 mb-0 text-gray-800">Add Class</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="card o-hidden border-0 shadow-lg">
                            <div class="card-body border-left-warning border-bottom-primary">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="p-5">
                                        <div class="">
                                            <h1 class="h4 text-gray-900 mb-2">Add new Class</h1>
                                            <div class="text-center mb-2">
                                                <span class="text-danger"><?php echo $file_upload_error; ?></span>
                                                <span class="text-success"><?php echo $success; ?></span>
                                            </div>
                                        </div>
                                        <form class="form" method="POST" enctype="multipart/form-data"
                                            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                            <div class="form-group mb-3">
                                                <select name="class" class="form-select form-control">
                                                    <option></option>
                                                    <option value="ND1">ND I</option>
                                                    <option value="ND2">ND II</option>
                                                    <option value="HND1">HND I</option>
                                                    <option value="HND2">HND II</option>
                                                </select>
                                                <span class="text-danger"><?php echo $class_error; ?></span>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="formFile" class="text-dark">Upload class CSV</label>
                                                <input class="form-control" name="students" type="file" id="formFile">
                                            </div>
                                            <input type="submit" name="student_upload" value="Add class"
                                                class="btn btn-primary btn-user btn-block">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HND II FINAL YEAR PROJECT
                            2023</span>
                    </div>
                    <div class="copyright text-center text-info my-auto">
                        <span>Developer <a href="#" class="text-info" target="_blank">Fortunatus</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
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
                    <a class="btn btn-danger" href="./includes/login.php">Logout</a>
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
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
</body>

</html>