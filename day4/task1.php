<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Task 1 -->
<?php
$products = [
    ["name" => "Phone", "price" => 2500, "quantity" => 3],
    ["name" => "Laptop", "price" => 12000, "quantity" => 5],
    ["name" => "Headphones", "price" => 500, "quantity" => 15]
];
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Product List</h2>
    <div class="row">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Price (EGP)</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>{$product['name']}</td>";
                    echo "<td>{$product['price']}</td>";
                    echo "<td>{$product['quantity']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Task 2-->
<?php
$employee = [
    "name" => "abdallah mohamed",
    "title" => "Frontend Developer",
    "department" => "UI/UX",
    "salary" => "120,000 EGP"
];
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Employee Details</h2>
    <div class="bg-white rounded shadow p-4 mx-auto" style="max-width: 400px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Name:</strong> <?= $employee['name']; ?></li>
            <li class="list-group-item"><strong>Job Title:</strong> <?= $employee['title']; ?></li>
            <li class="list-group-item"><strong>Department:</strong> <?= $employee['department']; ?></li>
            <li class="list-group-item"><strong>Salary:</strong> <?= $employee['salary']; ?></li>
        </ul>
    </div>
</div>

<!-- Task 3-->
<div class="container mt-5">
    <h2 class="mb-4">Employees with Salary > 8000</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $employees = [
                ["name" => "abdallah", "department" => "IT", "salary" => 9500],
                ["name" => "mona", "department" => "Finance", "salary" => 8200],
                ["name" => "Sara", "department" => "HR", "salary" => 7500],
                ["name" => "Omar", "department" => "Marketing", "salary" => 7900]
            ];

            foreach ($employees as $employee) {
                if ($employee['salary'] > 8000) {
                    echo "<tr>";
                    echo "<td>{$employee['name']}</td>";
                    echo "<td>{$employee['department']}</td>";
                    echo "<td>{$employee['salary']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<br>

<!--task 4 -->
<?php
$tools = ["VS Code", "Git", "GitHub", "Figma", "Postman"];
echo "Tools Count: " . count($tools) . "<br>";
if (in_array("GitHub", $tools)) {
    echo "GitHub is in the list.<br>";
} else {
    echo "GitHub is not in the list.<br>";
}
echo "All Tools: ";
print_r(array_values($tools));
?>
<br>

<!--task 5 -->
<?php
$courses = ["HTML", "CSS", "JS", "PHP"];
$courses[] = "MySQL";
array_unshift($courses, "Git");
array_shift($courses);
?>
<div class="container mt-5">
    <h2 class="mb-4 text-white bg-success p-2 rounded">Available Courses</h2>
    <ul class="list-group">
        <?php
        foreach ($courses as $course) {
            echo "<li class='list-group-item'>{$course}</li>";
        }
        ?>
    </ul>
</div>

    <!--task 6 -->
<div class="container mt-5">
<div class="card">
    <div class="card-body">
    <h3 class="text-danger fw-bold mb-4">Product Prices</h3>
    <ul class="list-group">
        <?php
        $products = [
            "Monitor" => 1200,
            "Chair" => 1000,
            "Headset" => 400,
            "Keyboard" => 300,
            "Mouse" => 150
        ];
        arsort($products);
        foreach ($products as $product => $price) {
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
            echo $product;
            echo '<span class="badge bg-dark text-white rounded-pill">' . $price . ' EGP</span>';
            echo '</li>';
        }
        ?>
    </ul>
    </div>
    </div>
</div>
    ?>

    <!--task 7 -->
    <div class="container mt-5">
<div class="card">
    <div class="card-body">
    <h3 class="text-info fw-bold mb-4">High Salary Employees</h3>
    <ul class="list-group">
        <?php
        $employees = [
            "Mona" => 6000,
            "Tarek" => 7000,
            "Ziad" => 5500,
            "Ahmed" => 4800,
            "Nour" => 4500
        ];
        $highSalaries = array_filter($employees, function($salary) {
            return $salary > 5000;
        });
        foreach ($highSalaries as $name => $salary) {
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
            echo $name;
            echo '<span class="badge bg-dark text-white rounded-pill">' . $salary . ' EGP</span>';
            echo '</li>';
        }
        ?>
    </ul>
    </div>
</div>
</div>
    <!------------------------ project ----------->

    <div class="container mt-5">
    <h3 class="mb-4"> Students Grades Table</h3>

    <?php
    $students = [
    ["name" => "Ahmed", "type" => "Bachelor", "grade" => 75],
    ["name" => "Sara", "type" => "Master", "grade" => 58],
    ["name" => "Youssef", "type" => "Bachelor", "grade" => 82],
    ["name" => "Nour", "type" => "PhD", "grade" => 47],
    ["name" => "Mona", "type" => "Master", "grade" => 90]
    ];
    ?>

    <table class="table table-bordered table-striped">
    <thead class="table-dark">
    <tr>
        <th>Name</th>
        <th>Program</th>
        <th>Grade</th>
        <th>Status</th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($students as $index => $student): ?>
        <tr class="<?= $student['grade'] < 60 ? 'table-danger' : ''; ?>">
        <td><?= $student['name']; ?></td>
        <td><span class="badge bg-primary"><?= $student['type']; ?></span></td>
        <td><?= $student['grade']; ?></td>
        <td>
            <?php if($student['grade'] < 60): ?>
            <div class="alert alert-warning py-1 px-2 m-0"> At Risk</div>
            <?php else: ?>
            Passed
            <?php endif; ?>
        </td>
        <td>
            
            <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#studentModal<?= $index; ?>">
            Details
            </button>

        
            <div class="modal fade" id="studentModal<?= $index; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $index; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel<?= $index; ?>">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <?= $student['name']; ?></p>
                    <p><strong>Program:</strong> <?= $student['type']; ?></p>
                    <p><strong>Grade:</strong> <?= $student['grade']; ?></p>
                    <p><strong>Status:</strong> <?= $student['grade'] < 60 ? 'Needs Attention' : 'Good Standing'; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!------- task 8---------------------------------->
            <?php
    echo "<h4> Server Info</h4>";
    echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "Script Name: " . $_SERVER['SCRIPT_NAME'] . "<br>";
    $fullURL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    echo "Full URL: " . $fullURL . "<br>";
?>

</body>
</body>
</html>
