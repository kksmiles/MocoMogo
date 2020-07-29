<?php
session_start();
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

$result1 = mysqli_query($con,"SELECT * FROM timer WHERE timerID=1");
$result2 = mysqli_query($con,"SELECT * FROM result WHERE what='roulette'");

$sth = 0;
while($extract = mysqli_fetch_array($result1)) {
	$timerroulette = $extract['timer'];
	if ($timerroulette==0) 
	{
		while($extract1 = mysqli_fetch_array($result2)) 
		{
			$temp=$extract1['result'];
			$_SESSION['resultRoulette']=$roulette[$temp]."x";
		}
		if ($sth==0)
		{
			$sth++;
				$_SESSION['triggerRoulette']="GO";
				
				echo "<script>
			    document.getElementById('Roll').click();
			    document.getElementById('btnBet').style=\"display : none;\";
			    document.getElementById('btns2').disabled = true; 
			  document.getElementById('btns3').disabled = true; 
			  document.getElementById('btns5').disabled = true; 
			  document.getElementById('btns20').disabled = true;
			   finalbet();
			  </script>";
  
		}
  
	}
	if ($timerroulette==20)
	{
			echo "<script>
    document.getElementById('btnBet').style=\"display : inline;\";
                      document.getElementById('btns2').disabled = false; 
                      document.getElementById('btns3').disabled = false; 
                      document.getElementById('btns5').disabled = false; 
                      document.getElementById('btns20').disabled = false;
  </script>";
	}
	if ($timerroulette<0)
	{
		
		echo "Good Luck";

	}
	else
	{
		$_SESSION['triggerRoulette']="NO";
		echo $timerroulette;
	}
}