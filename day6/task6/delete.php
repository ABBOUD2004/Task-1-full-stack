<?php
$msg = '';
if (isset($_GET['path'])) {
    $path = urldecode($_GET['path']);
    if (file_exists($path)) {
        unlink($path);
        $msg = "Image deleted successfully!";
        $alert = "success";
    } else {
        $msg = "Image not found!";
        $alert = "warning";
    }
} else {
    $msg = "No image selected!";
    $alert = "danger";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">
    <div class="alert alert-<?= $alert ?>">
        <?= $msg ?> <a href="index.php" class="alert-link">Go back</a>.
    </div>
</body>

</html>