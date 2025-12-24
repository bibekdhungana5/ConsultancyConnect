<?php
session_start();
include "../db.php";


if (!isset($_SESSION['admin_id'])) {
    header("Location: /project/auth/admin-login/login.php");
    exit;
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_GET['action'] == 'approve') {
        $conn->query("UPDATE consultancies SET status='approved' WHERE id=$id");
    }

    if ($_GET['action'] == 'reject') {
        $conn->query("UPDATE consultancies SET status='rejected' WHERE id=$id");
    }

    header("Location: admin_dashboard.php");
    exit;
}


$totalUsers = $conn->query("SELECT id FROM users")->num_rows;
$totalConsultancies = $conn->query("SELECT id FROM consultancies")->num_rows;
$pendingApprovals = $conn->query(
    "SELECT id FROM consultancies WHERE status='pending'"
)->num_rows;


$applications = $conn->query(
    "SELECT * FROM consultancies WHERE status='pending' ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Consultancy Connect</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>

<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <span>Consultancy Connect</span>
        </div>
        <div class="profile">
            <a href="admin_logout.php">Logout</a>
        </div>
    </div>
</header>

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <a class="active">Dashboard</a>
        <a>Consultancy Applications</a>
        <a>Approved Consultancies</a>
        <a>Users</a>
        <a class="logout" href="admin_logout.php">Logout</a>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="admin-content">

        <h1>Admin Dashboard</h1>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <p>Total Users</p>
                <h2><?= $totalUsers ?></h2>
            </div>

            <div class="stat-card">
                <p>Total Consultancies</p>
                <h2><?= $totalConsultancies ?></h2>
            </div>

            <div class="stat-card">
                <p>Pending Approvals</p>
                <h2><?= $pendingApprovals ?></h2>
            </div>
        </div>

        <!-- APPLICATIONS TABLE -->
        <section class="section">
            <h2>Consultancy Applications</h2>

            <table border="1" cellpadding="10" width="100%">
                <thead>
                    <tr>
                        <th>Consultancy</th>
                        <th>Owner</th>
                        <th>Municipality</th>
                        <th>Services</th>
                        <th>Document</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php if ($applications->num_rows > 0): ?>
                    <?php while ($row = $applications->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['consultancy_name'] ?></td>
                            <td><?= $row['owner_name'] ?></td>
                            <td><?= $row['municipality'] ?></td>
                            <td><?= $row['services'] ?></td>
                            <td>
                                <a href="uploads/<?= $row['document'] ?>" target="_blank">
                                    View
                                </a>
                            </td>
                            <td><?= ucfirst($row['status']) ?></td>
                            <td>
                                <a href="?action=approve&id=<?= $row['id'] ?>">Approve</a> |
                                <a href="?action=reject&id=<?= $row['id'] ?>">Reject</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No pending applications</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </section>

    </main>
</div>

<footer class="footer">
    <p>© 2025 Consultancy Connect</p>
</footer>

</body>
</html>
