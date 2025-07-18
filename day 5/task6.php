<?php
$alert = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["images"])) {
    $allowedExt = ["jpg", "jpeg"];
    $allowedTypes = ["image", "wave"];
    $maxSize = 4 * 1024 * 1024; 
    $files = $_FILES["images"];
    $errorFound = false;
    $errorMessage = "";
    foreach ($files["tmp_name"] as $index => $tmpName) {
        $name = $files["name"][$index];
        $size = $files["size"][$index];
        $type = $files["type"][$index];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $mainType = explode("/", $type)[0];

        if (!in_array($ext, $allowedExt)) {
            $errorFound = true;
            $errorMessage = " امتداد غير مسموح به في الملف: $name";
            break;
        }
        if ($size > $maxSize) {
            $errorFound = true;
            $errorMessage = " حجم الملف كبير جدًا: $name";
            break;
        }

        if (!in_array($mainType, $allowedTypes)) {
            $errorFound = true;
            $errorMessage = " نوع الملف غير مدعوم: $name";
            break;
        }
    }
    if ($errorFound) {
        $alert = '<div class="alert alert-danger mt-3">' . $errorMessage . '</div>';
    } else {
        foreach ($files["tmp_name"] as $index => $tmpName) {
            $name = basename($files["name"][$index]);
            move_uploaded_file($tmpName, "uploads/" . $name);
        }
        $alert = '<div class="alert alert-success mt-3"> تم رفع جميع الصور بنجاح!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>رفع صور متعددة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="mb-4"> رفع مجموعة صور</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="images" class="form-label">اختر الصور:</label>
            <input type="file" name="images[]" id="images" multiple class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">رفع الصور</button>
    </form>

    <?= $alert ?>

</body>
</html>
