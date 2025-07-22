<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$uploadDir = "uploads/";
$images = glob($uploadDir . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ccc;
        }

        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.03);
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <h2 class="mb-4 text-center"> Image Gallery</h2>

        <div class="gallery">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $imgPath): 
                    $file = basename($imgPath);
                ?>
                    <div class="card">
                        <img src="<?php echo $imgPath; ?>" alt="<?php echo $file; ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <p class="card-text small"><?php echo $file; ?></p>
                            <a href="<?php echo $imgPath; ?>" download class="btn btn-sm btn-primary">Download</a>
                            <a href="delete.php?file=<?php echo urlencode($file); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">No images found in the gallery.</p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="uplaod_img.php" class="btn btn-secondary">Back to Upload</a>

        </div>
    </div>

</body>
</html>
