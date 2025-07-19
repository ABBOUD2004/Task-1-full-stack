<?php
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $users = [
        "admin@example.com" => "1234",
        "test@example.com" => "test1"
    ];

    if (isset($users[$email]) && $users[$email] === $password) {
        $_SESSION["user"] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "❌ Incorrect email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
<div class="card p-4 shadow" style="width: 400px;">
    <h4 class="text-center mb-3">Login</h4>
    <?php if ($message): ?>
        <div class="alert alert-danger text-center"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
        <a href="create.php" class="btn btn-link w-100 mt-2">Create Account</a>
    </form>
</div>
</body>
</html>