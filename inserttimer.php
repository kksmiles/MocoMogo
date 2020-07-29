<?php

$rouletteTimer = $_REQUEST['rouletteTimer'];
$diceTimer = $_REQUEST['diceTimer'];
$coinTimer = $_REQUEST['coinTimer'];
$bingoTimer = $_REQUEST['bingoTimer'];
$bingoNumberTimer = $_REQUEST['bingoNumberTimer'];
$resultBingo = $_REQUEST['resultBingo'];
$resultDice1 = $_REQUEST['resultDice1'];
$resultDice2 = $_REQUEST['resultDice2'];
$resultCoin = $_REQUEST['resultCoin'];
$resultRoulette = $_REQUEST['resultRoulette'];

		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }


mysqli_query($con,"UPDATE timer SET timer = '$rouletteTimer' WHERE timerID=1");
mysqli_query($con,"UPDATE timer SET timer = '$diceTimer' WHERE timerID=2");
mysqli_query($con,"UPDATE timer SET timer = '$coinTimer' WHERE timerID=3");
mysqli_query($con,"UPDATE timer SET timer = '$bingoTimer' WHERE timerID=4");
mysqli_query($con,"UPDATE timer SET timer = '$bingoNumberTimer' WHERE timerID=5");
mysqli_query($con,"UPDATE result SET result = '$resultBingo' WHERE what='bingo'");
mysqli_query($con,"UPDATE result SET result = '$resultRoulette' WHERE what='roulette'");
mysqli_query($con,"UPDATE result SET result = '$resultCoin' WHERE what='coin'");
mysqli_query($con,"UPDATE result SET result = '$resultDice1' WHERE what='dice1'");
mysqli_query($con,"UPDATE result SET result = '$resultDice2' WHERE what='dice2'");

