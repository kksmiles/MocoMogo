<?php
session_start();

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
$userID = $_SESSION['userID'];
$result1 = mysqli_query($con,"SELECT * FROM user WHERE userID='$userID'");

while($extract = mysqli_fetch_array($result1)) 
{
	echo $extract['userCash'];
}