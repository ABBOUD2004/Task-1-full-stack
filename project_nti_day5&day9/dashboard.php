<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
$user = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            min-height: 100vh;
            padding-top: 80px;
        }
        .card {
            background-color: #2c3e50;
            border-radius: 16px;
            padding: 30px;
        }
        .btn {
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card text-center shadow" style="width: 400px;">
        <h2>Welcome, <?= htmlspecialchars($user["username"]) ?></h2>

        <p><strong>Role:</strong> <?= $user["role"] ?></p>

        <a href="add_product.php" class="btn btn-success w-100">Products</a>

        <?php if ($user["role"] === "admin"): ?>
            <a href="create.php" class="btn btn-warning w-100">Create Account</a>
        <?php endif; ?>

        <a href="logout.php" class="btn btn-danger w-100">Logout</a>
    </div>
</div>

</body>
</html>
