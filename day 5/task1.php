<!--Task 2 --> 
<?php
$blockedIP = '127.0.0.1';
$visitorIP = $_SERVER['REMOTE_ADDR'];
if ($visitorIP === $blockedIP) {
    header("Location: denied.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">task 1</h1>
            </div>
            <div class="card-body">
                <h2 class="h5 mb-3 text-muted">Basic Information</h2>
                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <strong>Current script:</strong> <?php echo $_SERVER['PHP_SELF']; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Server name:</strong> <?php echo $_SERVER['SERVER_NAME']; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Browser:</strong> <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Request method:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Your IP:</strong> <?php echo htmlspecialchars($visitorIP); ?>
                    </li>
                </ul>
                <h2 class="h5 text-success">Access OK: GOOD host.</h2>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
