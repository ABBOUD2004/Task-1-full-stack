<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow p-4 text-center" style="width: 400px;">
        <h3 class="text-success mb-3">Welcome <?= htmlspecialchars($_SESSION["user"]) ?></h3>
        <div class="d-flex justify-content-center gap-2">
            <a href="add_product.php" class="btn btn-primary">Products</a>
            <a href="create.php" class="btn btn-info text-white">Create Account</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
</body>
</html>