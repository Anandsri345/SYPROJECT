<?php
	$con = mysqli_connect('localhost','root','Anand#@27');
	if($conn)
	{
		echo"Connection succesful";
	}
	else
	{
		echo"No connection";
	}
	mysqli_select_db($con,'Sports');
	$name=$_POST['name'];
	$email=$_POST['email'];
	$sport=$_POST['sport'];
	$query = "insert into Sports Academy(name,email,sport)
		 values('$name','$email','$sport')";
	echo"$query";
	mysqli_query($con,$query);
	header('location:index.php');
?>