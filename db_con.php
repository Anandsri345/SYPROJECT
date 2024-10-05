<?php
$servername = "localhost"; // Change this to your MySQL server name if it's different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "test_db"; // Replace with the name of your MySQL database

// Create connection
$conn = new mysqli("Localhost","root","test_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
    // You can perform database operations here
}

// Close connection
$conn->close();
