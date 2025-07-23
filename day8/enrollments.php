<?php include './navbar.php'; ?>
<div class="container mt-5">
    <h2>Enrollments</h2>
    <a href="add_enrollment.php" class="btn btn-primary mb-3">Add Enrollment</a>
    <table class="table table-bordered">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './db/db.php';
            $sql = "SELECT enrollments.id, students.name AS student_name, courses.title AS course_title, enrollments.grade, enrollments.enrollment_date 
            FROM enrollments 
            JOIN students ON enrollments.student_id = students.id 
            JOIN courses ON enrollments.course_id = courses.id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>{$row['student_name']}</td>
                <td>{$row['course_title']}</td>
                <td>{$row['grade']}</td>
                <td>{$row['enrollment_date']}</td>
                <td>
                <a href='edit_enrollment.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_enrollment.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>