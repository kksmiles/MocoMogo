<?php
$roulette = array(0,2,3,2,5,2,
				5,2,3,2,3,
				2,3,2,5,20,
				5,2,3,2,3,
				2,3,2,5,2,
				5,2,3,2,3,
				2,3,2,5,2,
				5,2,3,2,3,
				2,3,2,3,2,
				3,2,5,2,5,
				2,3,2,3);
		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM result WHERE what='roulette'");

while($extract = mysqli_fetch_array($result1)) {
	echo "<script> var result4Roulette = ".$extract['result']."</script>";
	$temp = $extract['result'];
	echo "<script> var finalresult = ".$roulette[$temp]."</script>";

	
	if ($roulette[$temp]==2) 
	{
		echo "<span style=\"color: #3f3f3f;\">".$roulette[$temp].	"x</span>";
	}
	else if ($roulette[$temp]==3) 
	{
		echo "<span style=\"color: #c8354e;\">".$roulette[$temp]."x</span>";
	}

	else if ($roulette[$temp]==5) 
	{
		echo "<span style=\"color: #45b5da;\">".$roulette[$temp]."x</span>";
	}

	else if ($roulette[$temp]==20) 
	{
		echo "<span style=\"color: #ffc870;\">".$roulette[$temp]."x</span>";
	}

}