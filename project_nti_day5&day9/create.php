<?php
session_start();
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] !== "admin") {
    header("Location: index.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');
    $role = $_POST["role"] ?? 'user';

    if (!empty($username) && !empty($password)) {
        require_once "config.php";
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $hashed_password, $role])) {
            $message = "Account created successfully!";
        } else {
            $message = "Error creating account.";
        }
    } else {
        $message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2e2e57, #5c5470);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background-color: #1f1f2e;
            padding: 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        .form-control, .form-select, .form-control:focus {
            background-color: #3b3b52;
            border: none;
            color: #fff;
        }
        .btn-primary {
            background: #6c5ce7;
            border: none;
        }
        .btn-primary:hover {
            background: #a29bfe;
            color: #000;
        }
        .alert-info {
            background-color: #00cec9;
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h3 class="text-center mb-4">Create New Account</h3>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
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
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button class="btn btn-primary w-100">Create Account</button>
    </form>
</div>

</body>
</html>
