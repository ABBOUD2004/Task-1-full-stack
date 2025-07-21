<?php

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = date('Ymd_His_') . basename($file['name']);
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $msg = "<div class='alert alert-success'>Image uploaded successfully!</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Failed to upload image.</div>";
    }
}


$images = glob("uploads/*");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Upload and Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">

    <h3 class="mb-4">Upload Image</h3>

    <?= $msg ?>

    <form action="" method="post" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <h3>Uploaded Images</h3>
    <table class="table table-bordered table-dark">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Path</th>
            <th>Action</th>
        </tr>
        <?php if (count($images) > 0): ?>
            <?php foreach ($images as $i => $img): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><img src="<?= $img ?>" width="80"></td>
                    <td><?= $img ?></td>
                    <td>
                        <a href="delete.php?path=<?= urlencode($img) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No images found.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>

</html>