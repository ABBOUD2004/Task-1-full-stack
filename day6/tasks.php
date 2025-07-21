<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-primary"> Order Summary</h2>

        <?php
        
        function calculateTotal($items) {
            return array_sum($items);
        }

        $calcTax = fn($amount) => $amount * 0.14;

        
        $products = [120, 80, 200];

        $subtotal = calculateTotal($products);
        $tax = $calcTax($subtotal);
        $total = $subtotal + $tax;
        ?>

        <ul class="list-group mb-3">
            <li class="list-group-item">Subtotal: <strong><?= $subtotal ?> EGP</strong></li>
            <li class="list-group-item">Tax (14%): <strong><?= number_format($tax, 2) ?> EGP</strong></li>
            <li class="list-group-item list-group-item-success">Total: <strong><?= number_format($total, 2) ?> EGP</strong></li>
        </ul>
    </div>
</div>
<br>
    <!--task 2 -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text Analyzer Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <div class="card p-4 shadow">
        <h2 class="mb-4 text-primary"> Text Analyzer</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="sentence" class="form-label">Enter a sentence:</label>
                <input type="text" name="sentence" id="sentence" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Analyze</button>
    </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST["sentence"];
            $length = strlen(string: $input);
            $filtered = str_replace(search: "bad", replace: "****", subject: $input);
            $first10 = substr(string: $input, offset: 0, length: 10);
            $ucFirst = ucfirst(string: $input);
            $upperAll = strtoupper(string: $input);
        ?>
        <div class="mt-4">
            <h5 class="text-info"> Analysis Results:</h5>
            <ul class="list-group">
                <li class="list-group-item">Original Length: <?= $length ?> characters</li>
                <li class="list-group-item">Filtered (bad → ****): <?= $filtered ?></li>
                <li class="list-group-item">First 10 Characters: <?= $first10 ?></li>
                <li class="list-group-item">Ucfirst: <?= $ucFirst ?></li>
                <li class="list-group-item">Uppercase: <?= $upperAll ?></li>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>

</body>
</html>
