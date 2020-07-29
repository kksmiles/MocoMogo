<?php

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

$result1 = mysqli_query($con,"SELECT * FROM timer WHERE timerID=2");
$sth = 0;
while($extract = mysqli_fetch_array($result1)) 
{
	$timerdice = $extract['timer'];
	if ($timerdice==0) 
	{
		if ($sth==0)
		{
		echo "<script>
	    document.getElementById('comeOutButton').click();
	    document.getElementById('btn23').disabled = true; 
	    document.getElementById('btn45').disabled = true; 
	    document.getElementById('btn68').disabled = true; 
	    document.getElementById('btn911').disabled = true;                           
	    document.getElementById('btn12').disabled = true;
	    document.getElementById('btnBet').style=\"display : none;\";
	  </script>";
	  	$sth++;
		}
	}
	if($timerdice==20)
	{
		echo "<script> 
			document.getElementById('btn23').disabled = false; 
            document.getElementById('btn45').disabled = false; 
            document.getElementById('btn68').disabled = false; 
            document.getElementById('btn911').disabled = false;                           
            document.getElementById('btn12').disabled = false;
            document.getElementById('btnBet').style=\"display : inline;\";
            clearBet();
            </script>";
	}
	if ($timerdice<0) 
	{
		echo "Good Luck!";
	}
	else
	{
		echo "<span>" . $extract['timer'] . "</span>";
	}
}