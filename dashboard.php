<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // If not logged in, redirect to the login page
    header("location: login.php");
    exit;
}

// Display the username
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sparx Sports Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        p {
            text-align: center;
        }
        .logout-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Dashboard, <?php echo $username; ?>!</h2>
        <p>This is the dashboard page for Sparx Sports Academy. You can add your content and features here.</p>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>