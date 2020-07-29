<?php
	include('connect.php');



	function randomGen($min, $max, $quantity) 
	{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
	}
	$randomNumbersBingo = randomGen(1,75,75);
	$randomNumbersRoulette = randomGen(1,54,54);
	$randomNumbersDice = randomGen(2,12,11);

	for ($i=0;$i<=100;$i++)
	{

		$query1 = "INSERT INTO random (randomID,randomNumber,what) VALUES ($i,$randomNumbersDice[$i],'Dice')";
		mysqli_query($con,$query1);
	}	
	// for ($i=0;$i<11;$i++)
	// {

	// 	$query1 = "INSERT INTO random (randomID,randomNumber) VALUES (1,$randomNumbersBingo[$i])";
	// 	$query2 = "INSERT INTO random (randomID,randomNumber) VALUES (2,$randomNumbersRoulette[$i])";
	// 	$query3 = "INSERT INTO random (randomID,randomNumber) VALUES (4,$randomNumbersDice[$i])";
	// 	mysqli_query($con,$query1);
	// 	mysqli_query($con,$query2);
	// 	mysqli_query($con,$query3);
	// }	
	// for ($i=0;$i<11;$i++)
	// {

	// 	$query1 = "INSERT INTO random (randomID,randomNumber) VALUES (1,$randomNumbersBingo[$i])";
	// 	$query2 = "INSERT INTO random (randomID,randomNumber) VALUES (2,$randomNumbersRoulette[$i])";
	// 	$query3 = "INSERT INTO random (randomID,randomNumber) VALUES (4,$randomNumbersDice[$i])";
	// 	mysqli_query($con,$query1);
	// 	mysqli_query($con,$query2);
	// 	mysqli_query($con,$query3);
	// }



	
?>