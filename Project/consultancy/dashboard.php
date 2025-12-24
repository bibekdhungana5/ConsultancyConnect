<?php
session_start();
include "../db.php";

/* ================== PROTECT PAGE ================== */
if (!isset($_SESSION['consultancy_id'])) {
    header("Location: /project/auth/consultancy-login/login.php");
    exit;
}

$cid = $_SESSION['consultancy_id'];

/* ================== FETCH CONSULTANCY ================== */
$consultancy = $conn->query(
    "SELECT * FROM consultancies WHERE id = $cid"
)->fetch_assoc();

/* ================== STATS ================== */
$totalRequests = $conn->query(
    "SELECT COUNT(*) AS total 
     FROM service_requests 
     WHERE consultancy_id = $cid"
)->fetch_assoc()['total'];

$pendingRequests = $conn->query(
    "SELECT COUNT(*) AS total 
     FROM service_requests 
     WHERE consultancy_id = $cid AND status='pending'"
)->fetch_assoc()['total'];

/* ================== FETCH REQUESTS ================== */
$requests = $conn->query(
    "SELECT sr.*, u.full_name 
     FROM service_requests sr
     JOIN users u ON sr.user_id = u.id
     WHERE sr.consultancy_id = $cid
     ORDER BY sr.created_at DESC"
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultancy Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <span>Consultancy Connect</span>
        </div>

        <nav>
            <a href="#">Home</a>
            <a href="#">Consultancies</a>
        </nav>

        <div class="profile">
            <?= htmlspecialchars($consultancy['consultancy_name']) ?>
        </div>
    </div>
</header>

<!-- ================= DASHBOARD ================= -->
<div class="dashboard-layout">

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar">
        <a class="active">Dashboard</a>
        <a>Profile</a>
        <a>Service Requests</a>
        <a href="logout.php" class="logout">Logout</a>
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="content">

        <h1>Dashboard Overview</h1>

        <!-- ===== STATS ===== -->
        <div class="stats-grid">
            <div class="stat-card">
                <p>Total Requests</p>
                <h2><?= $totalRequests ?></h2>
            </div>

            <div class="stat-card">
                <p>Pending Requests</p>
                <h2><?= $pendingRequests ?></h2>
            </div>
        </div>

        <!-- ===== PROFILE ===== -->
        <section class="card">
            <h2>Engineering Profile</h2>

            <h3><?= htmlspecialchars($consultancy['consultancy_name']) ?></h3>
            <p><?= htmlspecialchars($consultancy['owner_name']) ?></p>

            <p>Email: <?= htmlspecialchars($consultancy['email']) ?></p>
        </section>

        <!-- ===== SERVICE REQUESTS ===== -->
        <section class="card">
            <h2>Service Requests</h2>

            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($r = $requests->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['full_name']) ?></td>
                        <td><?= htmlspecialchars($r['message']) ?></td>
                        <td><?= ucfirst($r['status']) ?></td>
                        <td><?= $r['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </section>

    </main>
</div>

<footer class="footer">
© 2025 Consultancy Connect
</footer>

</body>
</html>
