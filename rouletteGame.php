<?php
	session_start();
	include('connect.php');
	$userID = $_SESSION['userID'];
	$query="SELECT * FROM user 
    	  WHERE userID = '$userID'";
	$ret=mysqli_query($con,$query);
  	$count=mysqli_num_rows($ret);
  	$arr=mysqli_fetch_array($ret);
  	$userID=$arr[0];
  	$userName=$arr[1];
  	$userEmail=$arr[2];
  	$userCash=$arr[6];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		$(document).ready(function(e){
			$.ajaxSetup({
				cache: false
			});
			setInterval( function(){ $('#result').load('roulette.php'); }, 20000 );
		});		



	</script>
</head>
<body  style="background-color:#27262c">
	<img id="roulette" src="img/roulette.png" alt="Roulette">
	<button onclick="rotateAnimation('roulette',20)">Roll</button>
	<h2 style="width: 150px;" id="status"></h2>

<form>

	

	<a href="#" onclick="clearBet()"style="text-decoration: none; color: gray;">Clear</a>
	<a href="#" onclick="tenBet()"style="text-decoration: none; color: gray;">+10</a>
	<a href="#" onclick="hundredBet()"style="text-decoration: none; color: gray;">+100</a>
	<a href="#" onclick="thousandBet()"style="text-decoration: none; color: gray;">+1k</a>
	<a href="#" onclick="tenThousandBet()"style="text-decoration: none; color: gray;">+10k</a>
	<a href="#" onclick="halfBet()"style="text-decoration: none; color: gray;">1/2</a>
	<a href="#" onclick="doubleBet()"style="text-decoration: none; color: gray;">2x</a>
	<a href="#" onclick="maxBet()"style="text-decoration: none; color: gray;">Max</a>
	<br>
	<input id="bet" type="text" name="" readonly>

  	<input type="radio" name="multiplier" id="2x" value="2x" checked> 2x
  	<input type="radio" name="multiplier" id="3x" value="3x"> 3x
  	<input type="radio" name="multiplier" id="5x" value="5x"> 5x  
  	<input type="radio" name="multiplier" id="20x" value="20x"> 20x

  	<button onclick="ggbet();" value="bet">bet</button>	
  	<input type="button" value="Submit" onclick="post();">
	<div id="result">
		
	</div>
	<p></p>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		function post()
		{	


			$.post('roulette.php',{},
			function(data)
			{
					$('#result').html(data);
					win=data+1;
					windegree=6.7*data;

					$('#result').html(windegree);	

			});



		}

	</script>

		<script type="text/javascript">
		var userCash = <?php echo $userCash ?>;
		var looper;
		var looper1;
		var degrees=0;
		var spin = 0;
		var betCash = 0;

		function rotateAnimation(el,speed)
		{
			// degrees = degrees+6.7;
			var cog1 = document.getElementById(el);
			
			if (navigator.userAgent.match("Chrome")) 
			{
				cog1.style.WebkitTransform = "rotate("+degrees+"deg)";	
			}
			else if (navigator.userAgent.match("Firefox")) 
			{
				cog1.style.MozTransform = "rotate("+degrees+"deg)";	
			}			
			else if (navigator.userAgent.match("MSIE")) 
			{
				cog1.style.msTransform = "rotate("+degrees+"deg)";	
			}			
			else if (navigator.userAgent.match("Opera")) 
			{
				cog1.style.OTransform = "rotate("+degrees+"deg)";	
			}			
			else
			{
				cog1.style.transform = "rotate("+degrees+"deg)";	
			}

			looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);

			degrees=degrees+1;
			// if (spin==0&&(degrees%9)==0) 
			// {
				
			// 	speed=speed-0.5;
			// 	clearTimeout(looper);
			// 	looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);
			// }
			// if (spin==3&&(degrees%9)==0)
			// {
			// 	speed=speed+0.5;
			// 	clearTimeout(looper);
			// 	looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);
			// }
			// if (spin>3&&spin<6&&(degrees%9)==0)
			// {
			// 	speed=speed+0.5;
			// 	clearTimeout(looper);
			// 	looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);
			// }
			// if (spin==6) {clearTimeout(looper)};

			if (degrees>359)
			{
				degrees = 1;
				spin++;
			}
			if (degrees==Math.floor(windegree))
			{

				clearTimeout(looper);
			}




				
			document.getElementById("status").innerHTML= "rotate("+degrees+"deg)";

		}
				function stopRoulette()
		{

		}
		function clearBet()
		{
			betCash=0;
			document.getElementById("bet").value=betCash;
	
		}
		function tenBet()
		{

			betCash=betCash+10;
			if (betCash>userCash)
			{
				betCash=userCash;
			}
			document.getElementById("bet").value=betCash;
		}
		function hundredBet()
		{
			betCash=betCash+100;
			if (betCash>userCash)
			{
				betCash=userCash;
			}
			document.getElementById("bet").value=betCash;
		}
		function thousandBet()
		{
			betCash=betCash+1000;
			if (betCash>userCash)
			{
				betCash=userCash;
			}
			document.getElementById("bet").value=betCash;

		}
		function thousandBet()
		{
			betCash=betCash+1000;
			if (betCash>userCash)
			{
				betCash=userCash;
			}
			document.getElementById("bet").value=betCash;

		}
		function tenThousandBet()
		{
			betCash=betCash+10000;
			if (betCash>userCash)
			{
				betCash=userCash;
			}
			document.getElementById("bet").value=betCash;

		}
		function halfBet()
		{
			betCash=betCash/2;
			document.getElementById("bet").value=betCash;

		}
		function doubleBet()
		{
			betCash=betCash*2;
			document.getElementById("bet").value=betCash;

		}
		function MaxBet()
		{
			betCash=userCash;
			document.getElementById("bet").value=betCash;

		}
		function ggbet()
		{
			
			if (document.getElementById('2x').checked)
			{
				betx=document.getElementById('2x').value;
			}
			else if (document.getElementById('3x').checked)
			{
				betx=document.getElementById('3x').value;
			}
			else if (document.getElementById('5x').checked)
			{
				betx=document.getElementById('5x').value;
			}
			else if (document.getElementById('20x').checked)
			{
				betx=document.getElementById('20x').value;
			}
			alert("Cash = " + betCash +"  multiplier = "+ betx);
		}
	</script>

</form>


</body>
</html>