<?php
session_start();
$conn = new mysqli("localhost", "root", "", "consultancy");

/* ================= GET CONSULTANCY ================= */
$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM consultancies WHERE id = '$id' AND status='approved'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Consultancy not found");
}

$consultancy = $result->fetch_assoc();

/* ================= HANDLE REQUEST ================= */
$request_success = false;

if (isset($_POST['request_service'])) {

    if (!isset($_SESSION['user_id'])) {
        header("Location: /project/auth/login/login.php?redirect=profile.php?id=$id");
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    
    $conn->query("
        INSERT INTO service_requests (user_id, consultancy_id, message)
        VALUES ('$user_id', '$id', '$message')
    ");

    $request_success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $consultancy['consultancy_name']; ?> | Consultancy Connect</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <span>Consultancy Connect</span>
        </div>

        <nav>
                <a href="/project/index.php">Home</a>
                <a href="/project/pages/explore/explore.php">Consultancies</a>
                <a href="/project/pages/about/about.php">About</a>
        </nav>

        <div class="auth">
            <?php if(isset($_SESSION['user_id'])): ?>
                <span>Hi, <?php echo $_SESSION['user_name']; ?></span>
                <a href="/project/auth/logout.php" class="btn-outline">Logout</a>
            <?php else: ?>
                <a href="/project/auth/login/login.php" class="btn-outline">Login</a>
                <a href="/project/auth/register-user/register.php" class="btn-primary">Register</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- ================= PROFILE HEADER ================= -->
<section class="profile-header container">
    <h1><?php echo $consultancy['consultancy_name']; ?></h1>
    <p><?php echo $consultancy['municipality']; ?></p>
</section>

<!-- ================= PROFILE CONTENT ================= -->
<section class="container profile-grid">

    <!-- LEFT -->
    <div class="profile-left">

        <div class="card">
            <h3>Owner</h3>
            <p><?php echo $consultancy['owner_name']; ?></p>
        </div>

        <div class="card">
            <h3>Services</h3>
            <?php
            $services = explode(",", $consultancy['services']);
            foreach ($services as $s) {
                echo "<span class='tag'>$s</span> ";
            }
            ?>
        </div>

        <div class="card">
            <h3>Documents</h3>
            <a href="<?php echo $consultancy['document']; ?>" target="_blank">
                View Uploaded Document
            </a>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="profile-right">

        <div class="card">
            <h3>Contact</h3>
            <p>📞 <?php echo $consultancy['phone']; ?></p>
            <p>📧 <?php echo $consultancy['email']; ?></p>
        </div>

        <div class="card">
            <h3>Request Service</h3>

            <?php if($request_success): ?>
                <p style="color:green;">Request sent successfully!</p>
            <?php else: ?>

                <?php if(isset($_SESSION['user_id'])): ?>
                    <form method="POST">
                        <textarea name="message" placeholder="Describe your requirement..." required></textarea>
                        <button name="request_service" class="btn-primary full">
                            Submit Request
                        </button>
                    </form>
                <?php else: ?>
                    <a href="/project/auth/login/login.php?redirect=profile.php?id=<?php echo $id; ?>" class="btn-primary full">
                        Login to Request
                    </a>
                <?php endif; ?>

            <?php endif; ?>
        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->
<footer class="footer">
    <p>© 2025 Consultancy Connect</p>
</footer>

</body>
</html>
