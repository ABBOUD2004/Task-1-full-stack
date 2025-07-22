<?php
$correctEmail = "test@example.com";
$correctPassword = "123456";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($email === $correctEmail && $password === $correctPassword) {
        session_start();
        $_SESSION["username"] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "<div class='alert alert-danger text-center'>Invalid email or password!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-form {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

    <form method="POST" class="login-form">
        <h2 class="form-title text-center mb-4">Login to your account</h2>

        <?php echo $message; ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

</body>

</html>
