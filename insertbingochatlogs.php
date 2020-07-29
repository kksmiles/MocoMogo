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

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

		$con=mysqli_connect("localhost","root","","mocomogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }


mysqli_query($con,"INSERT INTO bingochatlogs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con,"SELECT * FROM bingochatlogs ORDER BY id ASC");

while($extract = mysqli_fetch_array($result1)) 
{
		if ($userName == $extract['username']) {
			echo "<span class=\"text-muted\" id=\"chatNameMe\">" . $extract['username'] . "</span> <br> <span id=\"chatMe\">" . $extract['msg'] . "</span><br /><br><br>";
	}
	else {
			echo "<span class=\"text-muted\" id=\"chatNameOthers\">" . $extract['username'] . "</span> <br> <span id=\"chatOthers\">" . $extract['msg'] . "</span><br /><br>";
	}
}