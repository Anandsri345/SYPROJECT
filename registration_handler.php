<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $experience = $_POST["experience"];
    $parent_name = $_POST["parent_name"];
    $emergency_contact = $_POST["emergency_contact"];

    // Database connection parameters
    $servername = "localhost"; // e.g., localhost
    $username_db = "root";
    $password_db = "Anand#@27";
    $database = "basketball_academy_db";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert form details into the table
    $query = "INSERT INTO registration_data (full_name, age, email, phone, experience, parent_name, emergency_contact) VALUES ('$full_name', $age, '$email', '$phone', '$experience', '$parent_name', '$emergency_contact')";
    if ($conn->query($query) === TRUE) {
        echo "Registration data inserted successfully.";
}
        // Display form data from the table
        $selectQuery = "SELECT * FROM registration_data";
        $result = $conn->query($selectQuery);

    // Close the database connection
    $conn->close();
}
?>