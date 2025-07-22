<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $originalName = basename($_FILES["file"]["name"]);
        $uploadDir = "uploads/";
        $safeName = time() . "_" . preg_replace("/[^a-zA-Z0-9\.\-_]/", "_", $originalName);
        $targetPath = $uploadDir . $safeName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
            $mime = mime_content_type($targetPath);
            $logLine = date("Y-m-d H:i:s") . " | " . $_SESSION["username"] . " | create | $targetPath | $mime\n";
            file_put_contents("log.txt", $logLine, FILE_APPEND);

            $message .= "<div class='alert alert-success'>File uploaded: $originalName</div>";
        } else {
            $message .= "<div class='alert alert-danger'>Upload failed for file: $originalName</div>";
        }
    } else {
        $message .= "<div class='alert alert-warning'>Please select a file to upload.</div>";
    }

    if (isset($_POST["select_option"])) {
        $selected = $_POST["select_option"];
        $message .= "<div class='alert alert-info'>You selected option: $selected</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload & Select</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #fceabb, #f8b500);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-secondary {
            background-color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Control Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="uplaod_img.php">Upload Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="logview.php">Login Log Table</a></li>
                    <li class="nav-item"><a class="nav-link" href="login_log_view.php">Image Log Table</a></li>
                </ul>
                <a href="logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card p-4">
            <h3 class="mb-4 text-center text-success">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h3>

            <?php echo $message; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file" class="form-label">Choose a file to upload</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                </div>

                <div class="mb-3">
                    <label for="select_option" class="form-label">Select an Option</label>
                    <select class="form-select" name="select_option" id="select_option" required>
                        <option disabled selected value="">Choose...</option>
                        <option value="1">Option One</option>
                        <option value="2">Option Two</option>
                        <option value="3">Option Three</option>
                    </select>
                </div>

                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </form>
        </div>

        <div class="text-center mt-4">
            <a href="gallery.php" class="btn btn-info me-2">View Gallery</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
