<?php include './db/db.php'; ?>
<?php include './navbar.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2>Courses</h2>
    <a href="add_course.php" class="btn btn-success mb-3">Add Course</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Hours</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM courses");
            while ($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['hours'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td>
                        <a href="edit_course.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_course.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>