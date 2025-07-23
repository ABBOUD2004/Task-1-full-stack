<?php include './db/db.php'; ?>
<?php include './navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM courses WHERE id = $id");
$course = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">
    <h2>Edit Course</h2>
    <form action="update_course.php" method="POST">
        <input type="hidden" name="id" value="<?= $course['id'] ?>">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="<?= $course['title'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $course['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Hours</label>
            <input type="number" name="hours" value="<?= $course['hours'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="text" name="price" value="<?= $course['price'] ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>