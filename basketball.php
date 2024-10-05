<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparx Basketball Academy Registration</title>
<style>
 video {
      position: fixed;
      top: 50%;
      left: 50%;
      right: 50%;
      transform: translate(-50%, -50%);
   min-width: 150%;
      min-height: 100%;
      width: 140px;
      height: 100px;
      z-index: -1;
    }
h2{
	color:Blue;
}
  form {
      width: 400px;
      padding: 20px;
      background-color: red;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      text-align: center;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color:white; /* Change the background color as needed */
    }

    label {
      color: green; /* Change the text color as needed */
    }
</style>
</head>
<body>
    <h2>Sparx Basketball Academy Registration</h2>
    <form action="registration_handler.php" method="POST">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>
        
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="experience">Basketball Experience:</label><br>
        <textarea id="experience" name="experience" rows="4" cols="50" required></textarea><br><br>
        
        <label for="parent_name">Parent/Guardian Name:</label><br>
        <input type="text" id="parent_name" name="parent_name" required><br><br>
        
        <label for="emergency_contact">Emergency Contact:</label><br>
        <input type="tel" id="emergency_contact" name="emergency_contact" required><br><br>
        
        <input type="submit" value="Register">
    </form>
 <video autoplay muted loop>
    <source src="bask.mp4" type="video/mp4">

  </video>
</body>
</html>