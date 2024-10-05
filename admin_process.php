<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Get username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Simulated user credentials (you would replace this with actual authentication logic)
        $valid_username = 'admin';
        $valid_password = 'password';

        // Check if the provided username and password match the valid credentials
        if ($username === $valid_username && $password === $valid_password) {
            // Authentication successful, redirect to admin panel
            header('Location: index.php');
            exit;
        } else {
            // Authentication failed, redirect back to login page with error message
            header('Location: adminlog.html?error=invalid_credentials');
            exit;
        }
    } else {
        // Username or password not provided, redirect back to login page with error message
        header('Location: adminlog.html?error=missing_fields');
        exit;
    }
} else {
    // If accessed directly without submitting the form, redirect to login page
    header('Location: adminlog.html');
    exit;
}
?>