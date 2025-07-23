<?php
include './db/db.php';

$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$grade = $_POST['grade'];
$enrollment_date = $_POST['enrollment_date'];

$sql = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date)
        VALUES ('$student_id', '$course_id', '$grade', '$enrollment_date')";

mysqli_query($conn, $sql);
header("Location: enrollments.php");
