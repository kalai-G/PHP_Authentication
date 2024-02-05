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
    <title>Access Denied</title>
</head>
<body>
    <h2>Access Denied</h2>
    <p>You do not have the required privileges to access this page.</p>
    <a href="dashboard.php">Go back to Dashboard</a>
</body>
</html>
