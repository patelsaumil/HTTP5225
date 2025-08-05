<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
session_start();
require_once('../db.php');

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$admin_username = $_SESSION['admin_username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; }
        h1 { margin-bottom: 10px; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        a { text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <h1>👋 Welcome, <?= htmlspecialchars($admin_username) ?>!</h1>
    <p>This is your admin dashboard.</p>

    <ul>
        <li><a href="pets/index.php">🐾 Manage Pets</a></li>
        <li><a href="breed/index.php">🐶 Manage Breeds</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
