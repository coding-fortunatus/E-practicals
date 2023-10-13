<?php

function getLecturerInfo($name) {
    global $conn;
    $getLecturerInfo = "SELECT * FROM lecturers WHERE fullname LIKE '%$name%'";
    $result = mysqli_query($conn, $getLecturerInfo);
    $lecturer_data = mysqli_fetch_assoc($result);
    return $lecturer_data;
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


function getAllCourses($class) {
    global $conn;
    $query = "SELECT * FROM course_practicals WHERE class = '$class'";
    $allClassCourses = mysqli_num_rows(mysqli_query($conn, $query));
    return $allClassCourses;
}

// To get class offering a particular course
function getClass($course_id) {
    global $conn;
    $query = "SELECT class FROM course_practicals WHERE id = '$course_id'";
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