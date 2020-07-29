<?php

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM result WHERE what='bingo'");

while($extract = mysqli_fetch_array($result1)) {
	echo $extract['result'];
}