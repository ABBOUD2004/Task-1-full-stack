<?php
include './navbar.php';
include './db/db.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h2>Add Enrollment</h2>
    <form action="insert_enrollment.php" method="post">
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <?php
                $students = mysqli_query($conn, "SELECT id, name FROM students");
                while ($s = mysqli_fetch_assoc($students)) {
                    echo "<option value='{$s['id']}'>{$s['name']}</option>";
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
                    echo "<option value='{$c['id']}'>{$c['title']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Grade</label>
            <input type="text" name="grade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Enrollment Date</label>
            <input type="date" name="enrollment_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>