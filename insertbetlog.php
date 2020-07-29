<?php
session_start();

$finalbetcash = $_REQUEST['finalbetcash'];
$bettype=$_REQUEST['bettype'];
$game=$_REQUEST['game'];
		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
	$userID = $_SESSION['userID'];
  	$query="SELECT * FROM user 
        WHERE userID = '$userID'";
    $ret=mysqli_query($con,$query);
    $count=mysqli_num_rows($ret);
    $arr=mysqli_fetch_array($ret);
	$userName=$arr[1];


mysqli_query($con,"INSERT INTO betlog (userName,betCash,betGame,betType) 
					VALUES 
					('$userName','$finalbetcash','$game','$bettype')");




?>