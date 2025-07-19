<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
$message = "";
$uploads_dir = "uploads/products";
if (!file_exists($uploads_dir)) mkdir($uploads_dir, 0777, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["product_name"] ?? '';
    $desc = $_POST["description"] ?? '';
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $img_name = basename($_FILES["image"]["name"]);
        $path = "$uploads_dir/$img_name";
        move_uploaded_file($_FILES["image"]["tmp_name"], $path);
        $message = "✅ Product added!";
    } else {
        $message = "❌ Image required!";
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
</head>
<body class="bg-light">
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 500px;">
        <h4 class="text-center mb-3">Add Product</h4>
        <?php if ($message): ?>
            <div class="alert alert-info text-center"><?= $message ?></div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button class="btn btn-success w-100">Add Product</button>
        </form>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <?php foreach ($images as $img): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="<?= "$uploads_dir/$img" ?>" class="card-img-top">
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