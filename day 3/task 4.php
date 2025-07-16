<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
//--------task 1------------------
    <?php 
    echo"hello world! ";
     print"abdallah moahmed";

?>
//----task 2-------------------------
<?php
$n=2;
$m=10;
echo "$n + $m" . "<br>";
echo "$n % $m";
?>
//--------task 3----------------------
<?php
$score=50;
if (!isset($score)) {
    echo "ادخل الدرجة";
} else {
    if ($score >= 50) {
        echo "pass";
    } else {
        echo "notpass";
    }
}
?>
//----------task 4---------------------
<?php
for ($i = 0; $i <= 20; $i++) {
    if ($i % 5 == 0) {
        echo $i . "<br>";
    }
}
?>
//---------------الطريقه التانيه------------------------
<?php
for ($i = 0; $i <= 20; $i += 5) {
    echo $i . "<br>";
}
?>
//--------task 5-------------------------

</body>
</html>