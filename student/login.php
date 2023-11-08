<?php
require_once "./includes/dbh.php";
session_start();

$username = $password = $username_error = $password_error = $login_error = "";

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) === true) {
    header("Location: index.php");
    exit;
} else {
    // Processing data from the form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['userlogin']) {
        // check for proper data entry
        if (empty($_POST['username'])) {
            $username_error = "Field cannot be empty";
            $login_error = "Invalid username entry";
        } else {
            $username = trim($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $password_error = "Field cannot be empty";
            $login_error = "Invalid login credentials";
        } else {
            $password = trim($_POST['password']);
        }

        if (empty($username_error) && empty($password_error) && empty($login_error)) {
            // Process the user information
            $sql = "SELECT id, username, user_role, password FROM users WHERE username = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $username);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $user_role, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["student_id"] = $id;
                                $_SESSION["username"] = $username;                           
                                // Redirect user to welcome page
                                header("Location: index.php");
                            } else{
                                // Password is not valid, display a generic error message
                                $login_error = "Invalid username or password.";
                            }
                        }
                    } else{
                        // Username doesn't exist, display a generic error message
                        $login_error = "Invalid username or password.";
                    }
                } else {
                    $login_error = "Oops! Something went wrong. Please try again later";
                }
                // Close statement
            mysqli_stmt_close($stmt);
            } 
        }
         // Close connection
    mysqli_close($conn);
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

    <title>E-Practical Report system - Student Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg py-5 my-5 mt-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Welcome Back!
                                        </h1>
                                        <span class="text-danger mb-2"><?php echo $login_error; ?></span>
                                    </div>
                                    <form class="user mt-2"
                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="username"
                                                placeholder="Enter Matric Number..." />
                                            <span class="text-danger"><?php echo $username_error; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password" />
                                            <span class="text-danger"><?php echo $password_error; ?></span>
                                        </div>
                                        <input type="submit" value="Login" name="userlogin"
                                            class="btn btn-primary btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>