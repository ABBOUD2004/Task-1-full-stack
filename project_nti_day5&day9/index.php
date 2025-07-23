<?php
session_start();
require_once "config.php";

$error = "";
$username = trim($_POST['username'] ?? '');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = [
                "id" => $user["id"],
                "username" => $user["username"],
                "role" => $user["role"]
            ];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
$conn = new mysqli("localhost", "root", "", "login_system");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background: #2a2a40;
            border-radius: 16px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
        }

        .form-control,
        .form-control:focus {
            background-color: #3c3c5a;
            border: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #6c5ce7;
            border: none;
        }

        .btn-primary:hover {
            background-color: #a29bfe;
            color: #000;
        }

        .alert-danger {
            background-color: #d63031;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="card">
        <h3 class="text-center mb-4">Login to Dashboard</h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <a href="create_user.php" class="btn btn-outline-light btn-sm">Create New Account</a>
        </div>

    </div>

</body>

</html>