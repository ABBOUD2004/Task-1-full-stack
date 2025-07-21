<?php
session_start();
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save'])) {
        $name = htmlspecialchars( trim( $_POST['name']));
        $email = htmlspecialchars( trim( $_POST['email']));
        if ($name && $email) {
            $_SESSION['users'][] = ['name' => $name, 'email' => $email];
        }
    }

    if (isset($_POST['remove_last'])) {
        array_pop($_SESSION['users']);
    }

    
    if (isset($_POST['clear'])) {
        $_SESSION['users'] = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="card p-4 shadow">
        <h2 class="mb-4 text-center text-primary"> Task 3</h2>

        <form method="POST" class="mb-4 row g-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-12 d-flex gap-3">
                <button name="save" class="btn btn-success">Save</button>
                <button name="clear" class="btn btn-danger">Clear Session</button>
                <button name="remove_last" class="btn btn-warning">Remove Last</button>
            </div>
        </form>

        <?php if (empty($_SESSION['users'])): ?>
            <div class="alert alert-danger text-center">No users!</div>
        <?php else: ?>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['users'] as $user): ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
