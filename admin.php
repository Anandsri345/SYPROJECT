<?php
session_start(); // Start session

// Initialize error message variable
$error_message = "";

// Check if form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "Anand#@27";
    $dbname = "sp_project_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    if(isset($_POST['user_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username and password match for user
        $check_user_query = "SELECT cus_id FROM customer WHERE cus_name='$username' AND password='$password'";
        $result = $conn->query($check_user_query);
        if ($result->num_rows > 0) {
            // User authenticated successfully, set success message
            $row = $result->fetch_assoc();
            $user_id = $row['cus_id']; // Retrieve cus_id from customer table
            $error_message = "Welcome back, $username!";

            // Set session variable to store user_id for future use
            $_SESSION['cus_id'] = $cus_id;
            
            // Redirect to index.html
            header("Location: index.php");
            exit;
        } else {
            // Set error message for invalid user credentials
            $error_message = "Invalid email or password for user";
        }
    } elseif(isset($_POST['admin_login'])) {
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];

        // Check if username and password match for admin
        $check_admin_query = "SELECT Admin_id FROM admin WHERE Admin_name='$admin_username' AND password='$admin_password'";
        $result = $conn->query($check_admin_query);
        if ($result->num_rows > 0) {
            // Admin authenticated successfully, set success message
            $row = $result->fetch_assoc();
            $admin_id = $row['Admin_id']; // Retrieve Admin_id from admin table
            $error_message = "Welcome back, $admin_username!";

            // Set session variable to store Admin_id for future use
            $_SESSION['admin_id'] = $admin_id;
            
            // Redirect to index.html
            header("Location: index.php");
            exit;
        } else {
            // Set error message for invalid admin credentials
            $error_message = "Invalid username or password for admin";
        }
    }

    // Close database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;     
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url(images/img15.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
    .container {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.5); /* Transparency */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(60, 164, 28, 0.598);
      width: 300px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    input:focus {
        color: rgb(28, 161, 28);
        outline: none;
        border: 3px solid rgba(56, 192, 99, 0.685);
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #5ab244;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }
    button:hover {
      background-color: #42c742;
    }
    h2 {
      margin-bottom: 20px;
    }
    a {
      text-decoration: none;
      color: #031703;
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="container">
  
  <main>
    <div class="login-form">
      <h2>Login</h2>
      <div class="login-option">
        <button onclick="showUserLogin()">User Login</button>
        <button onclick="showAdminLogin()" class="admin-btn">Admin Login</button>
      </div>
      <form id="userLoginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="user_login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
      </form>
      <form id="adminLoginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: none;">
        <div class="form-group">
          <label for="admin_username">Admin Username:</label>
          <input type="text" id="admin_username" name="admin_username" required>
        </div>
        <div class="form-group">
          <label for="admin_password">Admin Password:</label>
          <input type="password" id="admin_password" name="admin_password" required>
        </div>
        <button type="submit" name="admin_login" class="admin-btn">Login</button>
      </form>
    </div>
    <a href="index.html" class="back-home-btn">Back to Home</a>
  </main>
 
</div>


  <script>
    function showUserLogin() {
      document.getElementById("userLoginForm").style.display = "block";
      document.getElementById("adminLoginForm").style.display = "none";
    }

    function showAdminLogin() {
      document.getElementById("userLoginForm").style.display = "none";
      document.getElementById("adminLoginForm").style.display = "block";
    }

    <?php
    // Display JavaScript alert based on error message
    if (!empty($error_message)) {
        echo "alert('$error_message');";
    }
    ?>
  </script>
</body>
</html>