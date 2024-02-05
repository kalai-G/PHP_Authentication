<?php
require_once 'auth.php';

// Require user login
requireLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

    <?php if (isAdmin()): ?>
        <p>You have admin privileges.</p>
        <!-- Admin-specific content here -->
    <?php else: ?>
        <p>You have user privileges.</p>
        <!-- User-specific content here -->
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
