<?php

// To get each lecturer info
function getLecturerInfo($name) {
    global $conn;
    $getLecturerInfo = "SELECT * FROM lecturers WHERE fullname LIKE '%$name%'";
    $result = mysqli_query($conn, $getLecturerInfo);
    $lecturer_data = mysqli_fetch_assoc($result);
    return $lecturer_data;
}

// Get a student information
function getStudentInfo($mat_num) {
    global $conn;
    $getStdntInfo = "SELECT * FROM classes WHERE matric_number LIKE '%$mat_num%'";
    $result = mysqli_query($conn, $getStdntInfo);
    $student_data = mysqli_fetch_assoc($result);
    return $student_data;
}

function getClassTotal($class) {
    // Get all student total
    global $conn;
    $query = "SELECT * FROM classes WHERE class = '$class'";
    $total = mysqli_num_rows(mysqli_query($conn, $query));
    return $total;
}

function getClassCourses($class, $lecturer_id) {
    global $conn;
    $query = "SELECT course_code FROM course_practicals WHERE class = '$class' AND lecturer_id = '$lecturer_id'";
    $courses = mysqli_num_rows(mysqli_query($conn, $query));
    return $courses;
}

function getLecturerCourses($lecturer_id) {
    global $conn;
    $getCourseInfo = "SELECT * FROM course_practicals WHERE lecturer_id = '$lecturer_id'";
    $lecturerCourses = mysqli_query($conn, $getCourseInfo);
    return $lecturerCourses;
}

// To get all students in the department
function getAllStudents() {
    global $conn;
    $stdQuery = "SELECT * FROM classes";
    $studentTotal = mysqli_num_rows(mysqli_query($conn, $stdQuery));
    return $studentTotal;
}

// To get class course practicals
function getAllCourses($class) {
    global $conn;
    $query = "SELECT * FROM course_practicals WHERE class = '$class'";
    $course_data = mysqli_query($conn, $query);
    return $course_data;
}

// To get class offering a particular course
function getClass($course_id) {
    global $conn;
    $query = "SELECT class, course_code FROM course_practicals WHERE id = '$course_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// Query to get all student/class offering a course practicals
function getCourseStudents($class) {
    global $conn;
    $query = "SELECT * FROM classes WHERE class = '$class'";
    $classList = mysqli_query($conn, $query);
    return $classList;
}


// To get the students report status dynamically
function getStudentReportStatus($student_id){
    global $conn; 
    $query = "SELECT * FROM practical_reports WHERE student_id = '$student_id'";
    $practicals_reported = mysqli_num_rows(mysqli_query($conn, $query));
    // set custom status based on numbers of practicals
    if ($practicals_reported == 0) {
        $status = "Not started";
    } elseif ($practicals_reported > 0) {
        $status = "In-progress";
    } else {
        $status = "Completed";
    }
    return $status;
}


// To get student pratcical reports
function getstudentReport($student_id) {
    global $conn;

    $sql = "SELECT * FROM practical_reports WHERE student_id = '$student_id'";
    return mysqli_query($conn, $sql);
}

// To upload student reports
function uploadReports($student_id, $course_id, $execise_num, $p_title, $aim_objectives, $procedures, $exp_gain, $problem, $date_time, $attachment){
    
    global $conn;
    $check = "SELECT * FROM practical_reports WHERE exercise_number = '$execise_num' AND student_id = '$student_id' AND course_id = '$course_id'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 0) {
        $message =  "<span class='text-warning'>Report already submitted</span>";
    } else {
        $insert = "INSERT INTO practical_reports(student_id, course_id, exercise_number, practical_title, aim_objectives, procedures, experience_gain, problem_encountered, date_time, attachment)VALUES($student_id, $course_id, $execise_num, '$p_title', '$aim_objectives', '$procedures', '$exp_gain', '$problem', '$date_time', '$attachment')";
        if (mysqli_query($conn, $insert)) {
            $message = "<span class='text-success'>Report successfully submitted</span>";
        } else {
            $message = "<span class='text-danger'>Oops, an error occured</span>";
        }
    }
    return $message;
}