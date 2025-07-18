<?php
$uploadSuccess = false;
$error = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username'] ?? '');
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $fileTmp  = $image['tmp_name'];
    $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $fileType = explode('/', $image['type'])[0];
    $allowed = ['png', 'jpg', 'jpeg', 'gif'];
    if ($fileType === 'image' && in_array($fileExt, $allowed)) {
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }
        $target = 'uploads/' . basename($fileName);
        if (move_uploaded_file($fileTmp, $target)) {
            $uploadSuccess = true;
        } else {
            $error = "Failed to upload image.";
        }
    } else {
        $error = "Only PNG, JPG, JPEG, or GIF images are allowed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Upload an Image</h4>
        </div>
        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php elseif ($uploadSuccess): ?>
                <div class="alert alert-success">Image uploaded successfully!</div>
                <div class="text-center">
                    <img src="<?= $target ?>" class="img-thumbnail mt-2" style="max-width: 100%;">
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose an Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Upload</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
