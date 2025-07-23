<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}


$uploads_dir = 'uploads';
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["product_name"] ?? '');
    $desc = trim($_POST["description"] ?? '');

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $img_ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (in_array($img_ext, $allowed_exts)) {
            $img_name = time() . "_" . basename($_FILES["image"]["name"]);
            $path = "$uploads_dir/$img_name";
            move_uploaded_file($_FILES["image"]["tmp_name"], $path);
            $message = "Product added successfully!";
        } else {
            $message = "Invalid image format!";
        }
    } else {
        $message = "Image is required!";
    }
}

$images = array_diff(scandir($uploads_dir), ['.', '..']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2e2e57, #5c5470);
            color: #fff;
            min-height: 100vh;
        }

        .card {
            background-color: #1f1f2e;
            border: none;
            border-radius: 16px;
            color: #fff;
        }

        .form-control, .form-control:focus {
            background-color: #3b3b52;
            border: none;
            color: #fff;
        }

        .btn-success {
            background: #6c5ce7;
            border: none;
        }

        .btn-success:hover {
            background: #a29bfe;
            color: #000;
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .card .card-body {
            background: #2c2c44;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .alert-info {
            background-color: #00cec9;
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 500px;">
        <h3 class="text-center mb-4">Add New Product</h3>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info text-center"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>
            <button class="btn btn-success w-100">Add Product</button>
        </form>
    </div>
</div>

<div class="container mt-5">
    <h4 class="text-white mb-4">Uploaded Products</h4>
    <div class="row">
        <?php foreach ($images as $img): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="<?= "$uploads_dir/$img" ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body text-center">
                        <p class="card-text"><?= htmlspecialchars($img) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
