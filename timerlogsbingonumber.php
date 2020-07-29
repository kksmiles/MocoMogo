<?php
		session_start();
		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM timer WHERE timerID=5");
$result2 = mysqli_query($con,"SELECT * FROM result WHERE what='bingo'");

while($extract = mysqli_fetch_array($result1)) 
{
	$timerbingo = $extract['timer'];
	if($timerbingo==0)
	{
		while($extract1 = mysqli_fetch_array($result2)) 
		{
			$temp=$extract1['result'];
			$_SESSION['triggerBingoNumber']="GO";
			$_SESSION['resultBingoNumber']=$extract1['result'];
		}
	echo "<script>
	
     document.getElementById('btncall').click();
  </script>";
	}
	else
	{
		$_SESSION['triggerBingoNumber']="NO";
	}
	echo "<span>" . $extract['timer'] . "</span>";
}