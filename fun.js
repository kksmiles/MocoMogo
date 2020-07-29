
function comeOutRoll() 
{
	var temp = parseInt(document.getElementById('resultDice1').innerText);
	console.log(temp);
	var winCount = 0;
	var lossCount = 0;
	var gameCount = 0;
	var thePoint = 0;
	var elDiceOne = document.getElementById('dice1');
	var elDiceTwo = document.getElementById('dice2');
	var elComeOut = document.getElementById('comeOutButton');
	//var elPointRoll = document.getElementById('pointRollButton');
	var elWinOrLoss = document.getElementById('winOrLoss');
	var elCrapsWins = document.getElementById('crapWins');
	var elCrapsLosses = document.getElementById('crapLosses');
	var diceOne = parseInt(document.getElementById('resultDice1').innerText);
	var diceTwo = parseInt(document.getElementById('resultDice2').innerText);
	var rollTotal = diceOne + diceTwo;

	//console.log(rollTotal + ' ' + diceOne + ' ' + diceTwo);
	elDiceOne.classList.toggle('animate');
	elDiceTwo.classList.toggle('animate');

	for (var i = 1; i <= 6; i++) {
		elDiceOne.classList.remove('show-' + i);
		if (diceOne === i) {
			elDiceOne.classList.add('show-' + i);
		}
	}

	for (var k = 1; k <= 6; k++) {
		elDiceTwo.classList.remove('show-' + k);
		if (diceTwo === k) {
			elDiceTwo.classList.add('show-' + k);
		}
	}
	if (document.getElementById("betdice").value == "2 to 3") {
		if (rollTotal == 2 || rollTotal == 3) {
			window.getTimeout(alert('You won'),1000);
		}
	}
	else if (document.getElementById("betdice").value == "4 to 5") {
		if (rollTotal == 4 || rollTotal == 5) {
			//alert('You won');
			window.getTimeout(alert('You won'),1000);
		}
	}
	else if (document.getElementById("betdice").value == "6 to 8") {
		if (rollTotal == 6 || rollTotal == 7 || rollTotal == 8) {
			//alert('You won');
			window.getTimeout(alert('You won'),1000);
		}
	}
	else if (document.getElementById("betdice").value == "9 to 11") {
		if (rollTotal == 9 || rollTotal == 10 || rollTotal == 11) {
			//alert('You won');
			window.getTimeout(alert('You won'),1000);
		}
	}
	else if (document.getElementById("betdice").value == "12") {
		if (rollTotal ==12) {
			//alert('You won');
			window.getTimeout(alert('You won'),1000);
		}
	}
}
