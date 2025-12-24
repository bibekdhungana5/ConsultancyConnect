<?php
$conn = new mysqli("localhost", "root", "", "consultancy");
if ($conn->connect_error) {
    die("Connection failed");
}

/* ================= FILTER VALUES ================= */
$municipality = $_GET['municipality'] ?? '';
$service      = $_GET['service'] ?? '';
$rating       = $_GET['rating'] ?? '';

/* ================= BASE QUERY ================= */
$sql = "SELECT * FROM consultancies WHERE status = 'approved'";

/* ================= APPLY FILTERS ================= */
if ($municipality != '') {
    $sql .= " AND municipality = '$municipality'";
}

if ($service != '') {
    $sql .= " AND services LIKE '%$service%'";
}

if ($rating != '') {
    $sql .= " AND rating >= $rating";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore Consultancies | Consultancy Connect</title>
    <link rel="stylesheet" href="explore.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <img src="images/logo.png">
            <span>Consultancy Connect</span>
        </div>

        <nav>

            <a href="/project/index.php">Home</a>
            <a href="/project/pages/explore/explore.php" class="active">Consultancies</a>
            <a href="/project/pages/about/about.php">About</a>  
        
        </nav>

        <div class="auth">
            <a href="login.php" class="btn-outline">Login</a>
            <a href="register.php" class="btn-primary">Register</a>
        </div>
    </div>
</header>

<!-- ================= EXPLORE HEADER ================= -->
<section class="explore-header">
    <div class="container">
        <h1>Explore Engineering Consultancies</h1>

        <!-- FILTER FORM -->
        <form method="GET" class="filter-row">

            <div class="filter-group">
                <label>Municipality</label>
                <select name="municipality">
                    <option value="">All</option>
                    <option <?=($municipality=="Kathmandu")?"selected":""?>>Kathmandu</option>
                    <option <?=($municipality=="Lalitpur")?"selected":""?>>Lalitpur</option>
                    <option <?=($municipality=="Bhaktapur")?"selected":""?>>Bhaktapur</option>
                    <option <?=($municipality=="Kirtipur")?"selected":""?>>Kirtipur</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Service</label>
                <select name="service">
                    <option value="">All</option>
                    <option value="Naksa" <?=($service=="Naksa")?"selected":""?>>Building Plan</option>
                    <option value="Structural" <?=($service=="Structural")?"selected":""?>>Structural Design</option>
                    <option value="Approval" <?=($service=="Approval")?"selected":""?>>Municipality Approval</option>
                    <option value="Supervision" <?=($service=="Supervision")?"selected":""?>>Site Supervision</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Rating</label>
                <select name="rating">
                    <option value="">Any</option>
                    <option value="4" <?=($rating=="4")?"selected":""?>>4+ Stars</option>
                    <option value="4.5" <?=($rating=="4.5")?"selected":""?>>4.5+ Stars</option>
                </select>
            </div>

            <button class="btn-primary">Filter</button>
        </form>
    </div>
</section>

<!-- ================= CONSULTANCY LIST ================= -->
<section class="explore-section">
    <div class="container">
        <div class="explore-grid">

            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="consultancy-card">
                        <h3><?= htmlspecialchars($row['consultancy_name']) ?></h3>
                        <p><strong>Engineer:</strong> <?= htmlspecialchars($row['engineer_name']) ?></p>
                        <p><strong>Municipality:</strong> <?= $row['municipality'] ?></p>
                        <p><strong>Services:</strong> <?= $row['services'] ?></p>
                        <p><strong>Rating:</strong> ⭐ <?= $row['rating'] ?></p>

                        <a href="/project/pages/profile/profile.php?id=<?= $row['id'] ?>" class="btn-primary">
                            Request Consultancy
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No consultancies found.</p>
            <?php endif; ?>

        </div>
    </div>
</section>


<footer class="footer">
    <p>© 2025 Consultancy Connect. All rights reserved.</p>
</footer>

</body>
</html>
