<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$logFile = "log.txt";
$logEntries = [];
$corruptedCount = 0;
$warningCount = 0;
$totalCount = 0;

if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $totalCount++;
        $parts = explode("|", $line);

        if (count($parts) === 5) {
            $logEntries[] = [
                "date" => $parts[0],
                "user" => $parts[1],
                "type" => $parts[2],
                "path" => $parts[3],
                "mime" => $parts[4],
                "status" => "normal"
            ];
        } else {
            $corruptedCount++;
            $logEntries[] = [
                "date" => "CORRUPTED",
                "user" => "N/A",
                "type" => "ERROR",
                "path" => "Invalid line",
                "mime" => $line,
                "status" => "corrupted"
            ];
        }
    }

    
    foreach ($logEntries as &$entry) {
        if ($entry["status"] === "corrupted") {
            continue;
        }

        $isWarning = false;

        if (!in_array(strtolower($entry["type"]), ["create", "created"])) {
            $isWarning = true;
        }

        if (str_contains($entry["mime"], "2025")) {
            $isWarning = true;
        }

        if (str_ends_with($entry["path"], ".jpg") && !str_contains($entry["mime"], "jpeg")) {
            $isWarning = true;
        }

        if ($isWarning) {
            $entry["status"] = "warning";
            $warningCount++;
        }
    }
    unset($entry);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #e1bee7);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-warning td {
            background-color: #fff3cd !important;
        }

        .table-danger td {
            background-color: #f8d7da !important;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .summary-box {
            background: #f8f9fa;
            border-left: 5px solid #17a2b8;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card p-4 mb-4">
            <h2 class="mb-4 text-center">Upload Log Records</h2>

            <div class="row mb-3 text-center">
                <div class="col-md-4">
                    <div class="p-3 border rounded summary-box">
                        <h5>Total Logs</h5>
                        <p class="fs-4 mb-0"><?php echo $totalCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded summary-box">
                        <h5>Warnings</h5>
                        <p class="fs-4 text-warning mb-0"><?php echo $warningCount; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border rounded summary-box">
                        <h5>Corrupted</h5>
                        <p class="fs-4 text-danger mb-0"><?php echo $corruptedCount; ?></p>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Path</th>
                        <th>MIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logEntries as $entry):
                        $rowClass = "";

                        if ($entry["status"] === "corrupted") {
                            $rowClass = "table-danger";
                        } elseif ($entry["status"] === "warning") {
                            $rowClass = "table-warning";
                        }
                        ?>
                        <tr class="<?php echo $rowClass; ?>">
                            <td><?php echo htmlspecialchars($entry["date"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["user"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["type"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["path"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["mime"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="uplaod_img.php" class="btn btn-secondary">Back to Upload</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>
