<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "e_practical");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB_NAME);

if (!$conn) {
    die("Connection Error :".mysqli_connect_error());
}

?>