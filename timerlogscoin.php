<?php

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM timer WHERE timerID=3");
$sth = 0;
while($extract = mysqli_fetch_array($result1)) 
{
	$timerCoin = $extract['timer'];
	if ($timerCoin==0) 
	{

		echo "<script>
	    document.getElementById('btnFlip').click();
			document.getElementById('btnhead').disabled = true; 
            document.getElementById('btntail').disabled = true; 	    
	    document.getElementById('btnBet').style=\"display : none;\";
	  </script>";

	}
	if ($timerCoin==20)
	{
			echo "<script> 
			document.getElementById('btnhead').disabled = false; 
            document.getElementById('btntail').disabled = false; 
            document.getElementById('btnBet').style=\"display : inline;\";
            clearBet();
            </script>";
	}
	if ($timerCoin<0) 
	{
		echo "Good Luck!";
	}

	else
	{
		echo "<span>" . $extract['timer'] . "</span>";
	}
}

?>