
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Consultancy Connect</title>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="register.css">
</head>
<body>

<!-- ================= HEADER (SAME AS HOMEPAGE) ================= -->
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
            <button class="btn-outline"><a href="/project/auth/login/login.php">Login</a></button>
        </div>

    </div>
</header>

<!-- ================= REGISTER SECTION ================= -->
<section class="auth-section">
  

    <div class="auth-card">

        <h2>Create Your Account</h2>
        <p class="subtitle">
            Join Consultancy Connect to access trusted engineering services
        </p>

        <!-- REGISTER FORM -->
        <form id="registerForm" method="POST" action="user_register.php">
              <?php
if (isset($_GET['error'])) {
    echo "<p style='color:red'>" . $_GET['error'] . "</p>";
}

if (isset($_GET['success'])) {
    echo "<p style='color:green'>" . $_GET['success'] . "</p>";
}
?>

            <!-- FULL NAME -->
            <label>Full Name</label>
            <input type="text" id="name" name="name" placeholder="Ram Adhikari" required>

            <!-- EMAIL -->
            <label>Email Address</label>
            <input type="email" id="email" name="email" placeholder="example@connect.com" required>
            <!-- PHONE -->
            <label>Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="+977-98XXXXXXXX" required>

            <!-- PASSWORD -->
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Create a strong password" required>
            <!-- SUBMIT -->
            <button type="submit" class="btn-primary full-btn">
                Register
            </button>

        </form>

        <!-- TERMS -->
        <p class="terms">
            By registering, you agree to our
            <a href="#">Terms of Service</a> and
            <a href="#">Privacy Policy</a>
        </p>

        <!-- LOGIN LINK -->
        <p class="login-link">
            Already have an account?
            <a href="#">Log In</a>
        </p>
        
    <!-- MESSAGE DIV -->
<div id="message" style="color:red; margin-top:10px;"></div>
    </div>



</section>


<footer class="footer">
    <p>© 2025 Consultancy Connect. All rights reserved.</p>
</footer>



<!-- JS FILES -->

<!-- <script src="register.js"></script> -->

</body>
</html>