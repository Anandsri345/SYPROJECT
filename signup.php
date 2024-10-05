<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = "Anand#@27"; // Change this to your MySQL password
$dbname = "signed"; // Change this to the name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name = $conn->real_escape_string($_POST['last_name']);
$mobile_no = $conn->real_escape_string($_POST['mobile_no']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

if (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
    die("Error: First name must contain only characters.");
}

if (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
    die("Error: Last name must contain only characters.");
}

// Validate mobile number
if ($mobile_no(strlen!=10) & (!filter_var($mobile_no,FILTER_VALIDATE_INT)) {
    die("Error: Mobile number must be 10 digits.")
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format.");
}

// Validate password (You might want to add more complex validation rules here)
if (strlen($password) < 6) {
    die("Error: Password must be at least 6 characters.");
}
// Validate form data (you may want to implement more robust validation)
if (empty($first_name) || empty($last_name) || empty($mobile_no) || empty($email) || empty($password)) {
    die("Error: All fields are required.");
}
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    die("Error: Email already exists.");
}
// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement with placeholders
$sql = "INSERT INTO users (first_name, last_name, mobile_no, email, password) VALUES (?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $first_name, $last_name, $mobile_no, $email, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful";
} else {
    echo "Error: " . $stmt->error;
}

// Close prepared statement
$stmt->close();

// Close database connection
$conn->close();
?>