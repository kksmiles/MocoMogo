<?php
session_start();
	include('connect.php');
	// $query1 = "SELECT * FROM random WHERE what = 'Roulette'";
	// $query2 = "SELECT * FROM random WHERE what = 'Bingo'";
	// $query3 = "SELECT * FROM random WHERE what = 'Dice'";
	// $query4 = "SELECT * FROM random WHERE what = 'Coin'";
	// $ret=mysqli_query($con,$query1);
	// $count=mysqli_num_rows($ret);
	// $arr=mysqli_fetch_array($ret);
	// echo $count;
?>

<html>
<head>
<title>Start Server</title>

<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script>

function getRndInteger(min, max) 
{
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}
function shuffle(o) 
{
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};
function timer() 
{
	var rouletteTimer = 20;
	var diceTimer = 20;
	var coinTimer = 20;
	var bingoTimer = 240;
	var bingoNumberTimer = 5;
	var resultRoulette=0;
	var resultDice1=0;
	var resultDice2=0;
	var resultCoin="head";
	var resultBingo=0;
	var xmlhttp = new XMLHttpRequest();
	var i = setInterval(function()
	{
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
				document.getElementById('timerlogs').innerHTML = xmlhttp.responseText;
			}
		}
		
		xmlhttp.open('GET','inserttimer.php?rouletteTimer='+rouletteTimer+'&diceTimer='+diceTimer+'&coinTimer='+coinTimer+'&bingoTimer='+bingoTimer+'&bingoNumberTimer='+bingoNumberTimer+'&resultRoulette='+resultRoulette+'&resultDice1='+resultDice1+'&resultDice2='+resultDice2+'&resultBingo='+resultBingo+'&resultCoin='+resultCoin,true);
		xmlhttp.send();
	    rouletteTimer--;
	    diceTimer--;
	    coinTimer--;
	    bingoTimer--;
	   	bingoNumberTimer--;
	   	if(rouletteTimer==1)
	   	{
	   		resultRoulette=getRndInteger(1, 54) ;
	   	}
	    if(rouletteTimer == 0) 
	    {
		    setTimeout(function () 
		    {
		    rouletteTimer = 20;
			}, 15000);

	    }
	    if(diceTimer==1)
	    {
	    	resultDice1=getRndInteger(1,6);
	    	resultDice2=getRndInteger(1,6);
	    }
	    if(diceTimer == 0) 
	    {

		    setTimeout(function () 
		    {
		        diceTimer = 20;  
			}, 8000);	    	
	    }
	    if(coinTimer==1)
	    {
	    	var HoT = getRndInteger(0, 1);
	    	if (HoT == 1) 
	    	{
	    		resultCoin="head";
	    	}
	    	if (HoT==0)
	    	{
	    		resultCoin="tail";
	    	}
	    }
	    if(coinTimer == 0) 
	    {

		    setTimeout(function () 
		    {
		        coinTimer = 20;  
			}, 8000);	    	
	    }
	    if(bingoTimer == 0) 
	    {
		    setTimeout(function () 
		    {
		        bingoTimer = 240;  
			}, 10000);	    	
	    }
	    if(bingoNumberTimer == 0) 
	    {
	    	resultBingo=getRndInteger(1, 75);
		    setTimeout(function () 
		    {
		    bingoNumberTimer = 3;  
			}, 2000);
				    	
	    }

	}, 1000);
	
	


}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	setInterval( function(){ $('#timerlogsroulette').load('timerlogsroulette.php'); }, 200 );
	setInterval( function(){ $('#timerlogsdice').load('timerlogsdice.php'); }, 200 );
	setInterval( function(){ $('#timerlogscoin').load('timerlogscoin.php'); }, 200 );
	setInterval( function(){ $('#timerlogsbingo').load('timerlogsbingo.php'); }, 200 );
	setInterval( function(){ $('#timerlogsbingonumber').load('timerlogsbingonumber.php'); }, 200 );

	setInterval( function(){ $('#resultcoin').load('resultcoin.php'); }, 200 );
	setInterval( function(){ $('#resultbingo').load('resultbingo.php'); }, 200 );
	setInterval( function(){ $('#resultdice').load('resultdice.php'); }, 200 );
	setInterval( function(){ $('#resultroulette').load('resultroulette.php'); }, 200 );
});

</script>


</head>
<body>

<button onclick="timer()">Server Start</button>
<h1 style="text-align: center; color: green ;">Roulette</h1>
<div class="timerlogs"></div>
<div id="timerlogsroulette"	style="font-size: 40px; text-align: center;">
</div>
<div id="resultroulette" style="font-size: 20px; text-align: center;"></div>


<h1 style="text-align: center; color: gray;">Dice</h1>
<div id="timerlogsdice"	style="font-size: 40px; text-align: center;">
</div>
<div id="resultdice" style="font-size: 20px; text-align: center;"></div>


<h1 style="text-align: center; color: red;">Coin</h1>
<div id="timerlogscoin"	style="font-size: 40px; text-align: center;">
</div>
<div id="resultcoin" style="font-size: 20px; text-align: center;"></div>

<h1 style="text-align: center; color: gray;">Bingo</h1>
<div id="timerlogsbingo"	style="font-size: 40px; text-align: center;">
</div>

<h1 style="text-align: center; color: green;">Bingo Number</h1>
<div id="timerlogsbingonumber"	style="font-size: 40px; text-align: center;">
</div>
<div id="resultbingo" style="font-size: 20px; text-align: center;"></div>

</body>