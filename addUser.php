<?php
require_once "./includes/dbh.php";
session_start();
$username = $password = $user_role = $create_error = $username_error = $password_error = $user_role_error = $success = "";
// Check if the user is already logged in
if(!$_SESSION["loggedin"] === true){
    header("Location: login.php");
    exit;
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['adduser'])) {
        // Process user data from the form
        if (empty($_POST['username'])) {
            $username_error = "Field cannot be empty";
            $create_error = "Invalid username supplied!";
        } else {
            $username = trim($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $password_error = "Field cannot be empty";
            $create_error = "Invalid credentials supplied";
        } else {
            $password = trim($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        if (empty($_POST['user_role'])) {
            $user_role_error = "Invalid user role";
            $create_error = "Invalid information supplied";
        } else {
            $user_role = trim($_POST['user_role']);
        }

        if (empty($username_error) && empty($password_error) && empty($user_role_error) && empty($create_error)) {
            // Start processing form data to store into database
            $check = "SELECT username FROM users WHERE username = '$username'";
            $result = mysqli_execute_query($conn, $check);
            if (mysqli_num_rows($result) > 0) {
                $username_error = "Username already exists";
                $create_error = "User account already exists";
            } else {
                $query = "INSERT INTO users(username, password, user_role) VALUES(?, ?, ?)";
                if ($stmt = mysqli_prepare($conn, $query)) {
                    mysqli_stmt_bind_param($stmt, "sss", $username, $password, $user_role);
                    if (mysqli_stmt_execute($stmt)) {
                        $success = "User successfully added";
                    } else {
                        $create_error = "Oops!, something went wrong. Try again later";
                    }
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
            // Close connection
            mysqli_close($conn);
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

    <title>E-Practical Report system - Index</title>

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
            <li class="nav-item">
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
            <li class="nav-item active">
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
                        <h1 class="h3 mb-0 text-gray-800">Add User</h1>

                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row mb-5">
                        <div
                            class="card col-md-8 offset-md-2 o-hidden border-0 shadow-lg border-left-warning border-bottom-primary">
                            <div class="card-body ">
                                <!-- Nested Row within Card Body -->
                                <div class="p-5">
                                    <div class="">
                                        <h1 class="h4 text-gray-900 mb-4">Add new user</h1>
                                        <div class="text-center">
                                            <span class="text-success"><?php echo $success; ?></span>
                                            <span class="text-danger"><?php echo $create_error; ?></span>
                                        </div>
                                    </div>
                                    <form class="form mt-2"
                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                        <div class="form-group col-auto">
                                            <label for="user" class="form-control-text">Username</label>
                                            <input class="form-control" name="username" type="text" id="user">
                                            <span class="text-danger"><?php echo $username_error; ?></span>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="pass" class="form-control-text">Password</label>
                                            <input class="form-control" name="password" type="password" id="pass">
                                            <span class="text-danger"><?php echo $password_error; ?></span>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="role" class="form-control-text">Select user role</label>
                                            <select name="user_role" id="role" class="form-select form-control">
                                                <option></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Lecturer">Lecturer</option>
                                            </select>
                                            <span class="text-danger"><?php echo $user_role_error; ?></span>
                                        </div>
                                        <input type="submit" name="adduser" value="Add user"
                                            class="btn btn-primary btn-user btn-block">
                                    </form>
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
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
</body>

</html>