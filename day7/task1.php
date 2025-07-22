<?php
session_start();
$_SESSION['visits'] = ($_SESSION['visits'] ?? 0) + 1;
?>
<p class="m-3">page visits: <span class="badge bg-primary"><?= $_SESSION['visits'] ?></span></p>
