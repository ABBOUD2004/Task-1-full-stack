<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['file'])) {
    $filename = basename($_GET['file']); 
    $path = "uploads/" . $filename;

    if (file_exists($path)) {
        
        $mime = mime_content_type($path);
        
        
        unlink($path);

        
        $logLine = date("Y-m-d H:i:s") . " | " . $_SESSION["username"] . " | delete | $path | $mime\n";
        file_put_contents("log.txt", $logLine, FILE_APPEND);

        header("Location: dashboard.php?deleted=1");
        exit();
    } else {
        header("Location: dashboard.php?error=notfound");
        exit();
    }
} else {
    header("Location: dashboard.php?error=nofile");
    exit();
}
