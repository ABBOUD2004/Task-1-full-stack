<?php
include './navbar.php';
include './db/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM enrollments WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2>Edit Enrollment</h2>
    <form action="update_enrollment.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <?php
                $students = mysqli_query($conn, "SELECT id, name FROM students");
                while ($s = mysqli_fetch_assoc($students)) {
                    $selected = $s['id'] == $row['student_id'] ? 'selected' : '';
                    echo "<option value='{$s['id']}' $selected>{$s['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-control" required>
                <?php
                $courses = mysqli_query($conn, "SELECT id, title FROM courses");
                while ($c = mysqli_fetch_assoc($courses)) {
                    $selected = $c['id'] == $row['course_id'] ? 'selected' : '';
                    echo "<option value='{$c['id']}' $selected>{$c['title']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <input type="text" name="grade" class="form-control" value="<?= $row['grade'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Enrollment Date</label>
            <input type="date" name="enrollment_date" class="form-control" value="<?= $row['enrollment_date'] ?>"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>