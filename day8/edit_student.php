<?php
include './db/db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-4">
        <h2>Edit Student</h2>
        <form action="update_student.php?id=<?= $id ?>" method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?= $data['dob'] ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>