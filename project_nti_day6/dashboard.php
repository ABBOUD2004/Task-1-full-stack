<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #dff9fb, #c7ecee);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .container {
            max-width: 800px;
        }

        .welcome-box {
            margin-top: 60px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Control Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./uplaod_img.php">Upload Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./gallery2.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="./logview.php">Login Log Table</a></li>
                    <li class="nav-item"><a class="nav-link" href="./login_log_view.php">Image Log Table</a></li>
                </ul>
                <form class="d-flex me-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container welcome-box">
        <div class="alert alert-success text-center shadow-sm">
            Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>!<br>
            You have successfully logged in.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
