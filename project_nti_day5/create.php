<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $filename = basename($_FILES["file"]["name"]);
        $target = "uploads/users/" . $filename;

        if (!file_exists("uploads/users")) {
            mkdir("uploads/users", 0777, true);
        }

        move_uploaded_file($_FILES["file"]["tmp_name"], $target);
        $message = "✅ Account created successfully!";
    } else {
        $message = "❌ Please upload a file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
<div class="card p-4 shadow" style="width: 400px;">
    <h4 class="text-center mb-3">Create Account</h4>
    <?php if ($message): ?>
        <div class="alert alert-info text-center"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Signup</button>
    </form>
</div>
</body>
</html>