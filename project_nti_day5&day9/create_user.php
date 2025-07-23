<?php
require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (!empty($username) && !empty($password)) {
        $check = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $check->execute([$username]);

        if ($check->fetchColumn() > 0) {
            $message = " Username already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
            if ($stmt->execute([$username, $hashed_password])) {
                $message = " Registered successfully! You can now <a href='index.php'>login</a>.";
            } else {
                $message = " Registration failed.";
            }
        }
    } else {
        $message = " All fields required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background-color: #1c1c2c;
            padding: 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 430px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #fff;
        }

        .form-control {
            background-color: #2a2a3d;
            color: white;
            border: none;
        }

        .form-control:focus {
            background-color: #2a2a3d;
            color: white;
            box-shadow: none;
            border: 1px solid #00d4ff;
        }

        .btn-primary {
            background-color: #00d4ff;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #00bcd4;
        }

        .alert {
            background-color: #333;
            border-left: 4px solid #00d4ff;
            color: #fff;
        }

        a {
            color: #00d4ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card text-center">
    <h2 class="mb-4">Create Your Account</h2>

    <?php if (!empty($message)): ?>
        <div class="alert mb-3"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3 text-start">
            <label>Username</label>
            <input name="username" class="form-control" required>
        </div>
        <div class="mb-4 text-start">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Register</button>
    </form>

    <div class="mt-3">
        Already have an account? <a href="index.php">Login</a>
    </div>
</div>

</body>
</html>
