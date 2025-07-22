<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$logFile = "login_log.txt";
$logEntries = [];

if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = explode("|", $line);
        if (count($parts) === 3) {
            $logEntries[] = [
                "date" => $parts[0],
                "user" => $parts[1],
                "status" => $parts[2]
            ];
        } else {
            $logEntries[] = [
                "date" => "CORRUPTED",
                "user" => "UNKNOWN",
                "status" => "INVALID FORMAT"
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .table-success td {
            background-color: #d4edda !important;
        }

        .table-danger td {
            background-color: #f8d7da !important;
        }

        .table-warning td {
            background-color: #fff3cd !important;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card p-4">
            <h2 class="mb-4 text-center">Login Attempt Logs</h2>

            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logEntries as $entry):
                        $rowClass = "";

                        if ($entry["status"] === "ACCESS") {
                            $rowClass = "table-success";
                        } elseif ($entry["status"] === "FAIL") {
                            $rowClass = "table-danger";
                        } elseif ($entry["status"] === "INVALID FORMAT") {
                            $rowClass = "table-warning";
                        }

                        $isInconsistent = !str_contains($entry["user"], "@") && !in_array($entry["user"], ["admin", "root"]);
                        if ($isInconsistent && $rowClass === "") {
                            $rowClass = "table-warning";
                        }
                        ?>
                        <tr class="<?php echo $rowClass; ?>">
                            <td><?php echo htmlspecialchars($entry["date"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["user"]); ?></td>
                            <td><?php echo htmlspecialchars($entry["status"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="dashboard.php" class="btn btn-secondary me-2">Back to Dashboard</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>
