<?php

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM result WHERE what='dice1'");
$result2 = mysqli_query($con,"SELECT * FROM result WHERE what='dice2'");

while($extract = mysqli_fetch_array($result1)) {
	echo "<span id=\"resultDice1\">" . $extract['result'] . "</span>";
}while($extract1 = mysqli_fetch_array($result2)) {
	echo "<span id=\"resultDice2\">" . $extract1['result'] . "</span>";
}