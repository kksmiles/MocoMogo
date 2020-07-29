<?php

session_start();
include('connect.php');

$userID = $_SESSION['userID'];
$query="SELECT * FROM user 
        WHERE userID = '$userID'";
$ret=mysqli_query($con,$query);
$count=mysqli_num_rows($ret);
$arr=mysqli_fetch_array($ret);
$userID=$arr[0];
$userName=$arr[1];
$userEmail=$arr[2];
$userCash=$arr[4];

$userCash = $_REQUEST['userCash'];

		$con=mysqli_connect("localhost","root","","mocomogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }


mysqli_query($con,"UPDATE user SET userCash=$userCash WHERE userID=$userID");

$result1 = mysqli_query($con,"SELECT * FROM user WHERE userID=$userID");

while($extract = mysqli_fetch_array($result1)) 
{
	echo $extract['userCash'];
}