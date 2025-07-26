<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    .navbar-custom {
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    .navbar-custom .nav-link {
        color: #f1f1f1;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .navbar-custom .nav-link:hover {
        color: #00d4ff;
        transform: scale(1.05);
    }

    .navbar-custom .nav-link.active,
    .navbar-custom .nav-link.disabled {
        color: #cccccc;
    }

    .navbar-brand {
        font-weight: bold;
        color: #ffffff;
        text-shadow: 0 0 4px #00d4ff;
    }

    .navbar-toggler {
        border-color: #ffffff;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28 255, 255, 255, 0.7 %29)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/ %3E%3C/svg%3E");
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-4">
    <a class="navbar-brand" href="#">Training System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="students.php">Students</a></li>
            <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="enrollments.php">Enrollments</a></li>
            <li class="nav-item"><a class="nav-link" href="API.php">API</a></li>

            <?php if (isset($_SESSION["username"])): ?>
                <?php if ($_SESSION["role"] === "admin"): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Admin Panel</a></li>
                    <li class="nav-item"><a class="nav-link" href="login_logs.php">Login Logs</a></li>
                    <li class="nav-item"><a class="nav-link" href="failed_logins.php">Failed Logins</a></li>
                <?php endif; ?>

                <li class="nav-item">
                    <span class="nav-link disabled text-white">
                        👤 <?= htmlspecialchars($_SESSION["username"]) ?> (<?= $_SESSION["role"] ?>)
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
