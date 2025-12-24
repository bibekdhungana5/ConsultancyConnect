<?php
session_start();


if (isset($_SESSION['admin_id'])) {
    header("Location: /project/admin/admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | Consultancy Connect</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <span>Consultancy Connect</span>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Consultancies</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<section class="auth-section">
    <div class="auth-card">
        <div class="icon-box">
            <img src="images/icon.png" alt="Icon">
        </div>

        <?php
      
        if (isset($_SESSION['error'])) {
            echo "<p style='color:red; text-align:center'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>

        <h2>Admin Login</h2>
        <p class="subtitle">Enter your admin credentials to access the dashboard.</p>

       
        <form action="admin_login.php" method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="your.email@example.com" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn-primary full-btn">Login</button>
        </form>

        <div class="auth-links">
            <a href="#">Forgot Password?</a>
        </div>
    </div>
</section>

<footer class="footer">
    <p>© 2025 Consultancy Connect. All rights reserved.</p>
</footer>

</body>
</html>
