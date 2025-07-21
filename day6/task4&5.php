<?php
session_start();
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxFileSize = 2 * 1024 * 1024; 
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowedTypes)) {
        $message = '<div class="alert alert-danger"> النوع غير مسموح. فقط JPG, PNG, GIF.</div>';
    }
    elseif ($file['size'] > $maxFileSize) {
        $message = '<div class="alert alert-warning"> حجم الملف كبير جدًا. الحد الأقصى 2MB.</div>';
    } else {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // اسم عشوائي
        $filename = sprintf('%s.%s', $basename, $extension);
        $directory = 'uploads/' . date('Y-m-d');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        $destination = $directory . '/' . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $message = '<div class="alert alert-success"> تم رفع الصورة بنجاح: <br><strong>' . htmlspecialchars($destination) . '</strong></div>';
        } else {
            $message = '<div class="alert alert-danger"> حصل خطأ أثناء رفع الصورة.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Image Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header text-bg-primary">
                    <h4 class="text-white"> رفع صورة بأمان</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($message)) echo $message; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file" class="form-label">اختر صورة (JPG, PNG, GIF) - بحد أقصى 2MB</label>
                            <input type="file" name="file" id="file" class="form-control" accept="image/jpeg,image/png,image/gif" required>
                        </div>
                        <button type="submit" class="btn btn-success"> رفع الصورة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
