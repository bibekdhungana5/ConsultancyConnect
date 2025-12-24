<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Consultancy Connect</title>
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
                <a href="/project/index.php">Home</a>
                <a href="/project/pages/explore/explore.php">Consultancies</a>
                <a href="/project/pages/about/about.php">About</a>
        </nav>

        <div class="auth">
            <button class="btn-outline"><a href="/project/auth/register-user/register.php">Register</a></button>
        </div>

    </div>
</header>


<section class="auth-section">

    <div class="auth-card">

    
        <div class="icon-box">
            <img src="images/icon.png" alt="Icon">
        </div>
<?php
session_start();
if(isset($_SESSION['error'])){
    echo "<p style='color:red'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}
?>

        <h2>Login to Your Account</h2>
        <p class="subtitle">
            Enter your credentials to access your dashboard.
        </p>

        <form action="user_login.php"  method="POST">
            <label>Email</label>
            <input type="email" id="email" name="email" placeholder="your.email@example.com" required>

            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn-primary full-btn">
                Login
            </button>

        </form>

      
        <div class="auth-links">
            <a href="#">Don't have an account? Register</a>
            <a href="#">Forgot Password?</a>
        </div>

    </div>

</section>


<footer class="footer">
    <p>© 2025 Consultancy Connect. All rights reserved.</p>
</footer>

<!-- 
<script src="login_ajax.js"></script>
<script src="login.js"></script> -->

</body>
</html>
