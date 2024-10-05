<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title style="color: blue;">Cricket Academy Registration</title>
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

<h2>Cricket Academy Registration Form</h2>

<form action="submit_registrationcricket.php" method="post">
  <label for="name">Full Name:</label><br>
  <input type="text" id="name" name="name" required><br><br>
  
  <label for="age">Age:</label><br>
  <input type="number" id="age" name="age" required><br><br>
  
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>
  
  <label for="phone">Phone Number:</label><br>
  <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
  
  <label for="experience">Cricket Experience (Years):</label><br>
  <input type="number" id="experience" name="experience" min="0" required><br><br>
  
  <label for="position">Preferred Position:</label><br>
  <select id="position" name="position">
    <option value="Batsman">Batsman</option>
    <option value="Bowler">Bowler</option>
    <option value="All-rounder">All-rounder</option>
    <option value="Wicketkeeper">Wicketkeeper</option>
    <option value="Fielder">Fielder</option>
  </select><br><br>
  
  <label for="additional_info">Additional Information:</label><br>
  <textarea id="additional_info" name="additional_info" rows="4" cols="50"></textarea><br><br>
  
  <input type="submit" value="Submit">
</form> 
 <video autoplay muted loop>
    <source src="cric.mp4" type="video/mp4">

  </video>

</body>
</html>
