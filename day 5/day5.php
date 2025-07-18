<?php
$fullName = '';
$email = '';
$age = '';
$city = '';
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    $fullName = $_POST['fullName'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $city = $_POST['city'] ?? '';
    $firstName = explode(' ', trim($fullName))[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Info Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header bg-primary text-white">
            <h2 class="text-center mb-0">User Information</h2>
          </div>
          <div class="card-body">
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
              </div>
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <?php if ($submitted): ?>
        <div class="card shadow">
          <div class="card-header bg-success text-white">
            <h3 class="mb-0">Welcome, <?= htmlspecialchars($firstName); ?>!</h3>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item"><strong>Full Name:</strong> <?= htmlspecialchars($fullName); ?></li>
              <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($email); ?></li>
              <li class="list-group-item"><strong>Age:</strong> <?= htmlspecialchars($age); ?></li>
              <li class="list-group-item"><strong>City:</strong> <?= htmlspecialchars($city); ?></li>
            </ul>
          </div>
        </div>
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</body>
</html>
