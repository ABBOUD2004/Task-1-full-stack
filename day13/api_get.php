<?php

header("Content-Type: application/json");

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'training_system';

$CONN = mysqli_connect($host, $user, $pass, $db);

$students = [];

if (isset($_GET["id"]) && $_GET["id"] != null) {
    $id = (int) $_GET["id"]; 
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($CONN, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $students[] = $row;
    }
} else {
    $sql = "SELECT * FROM students";
    $result = mysqli_query($CONN, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $students[] = $row;
    }
}
echo json_encode($students);
?>
