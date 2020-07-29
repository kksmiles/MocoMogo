var result,userchoice;
function resetAll(){
	setTimeout(function()
		{
			var resetHTML='<div class="tail" ><img src="img/tailimg.png" width="240px" height="240px" /></div><div class="head"><img src="img/headimg.png" width="240px" height="240px"/></div>';
			$('.coinBox').fadeOut('slow',function(){
			$(this).html(resetHTML)
			}).fadeIn('slow',function(){
				$('#btnFlip').removeAttr('disabled');
			});
		},3000);
}
$(document).on('change','#userChoice',function(){
	userchoice=$(this).val();
	if(userchoice=="")
	{
		//alert('Please select a coin side');
		$(this).parent('p').prepend("<span class='text text-danger'>Coin side require!</span>")
		$('#btnFlip').attr('disabled','disabled');
		
	}
	else
	{
		$('#btnFlip').removeAttr('disabled');
		$(this).siblings('span').empty();
	}
	
	return userchoice;
	
});

//final result

function finalResult(result,userchoice)
{
	/*if(result==userchoice)
	{alert("Result : "+result+"\nYour Choice : "+userchoice+"\n\n\tWon");}
	else
	{alert("Result : "+result+"\nYour Choice : "+userchoice+"\n\n\tLost!!");}*/
	
	/*var resFormat='<h3>';
	resFormat+= '<span class="text text-primary">You : <u>'+userchoice+'</u></span> |';
	resFormat+= '<span class="text text-danger">Result : <u>'+Result'</u></span> |';
	resFormat+='</h3>';
	var winr='<h2 class="text text-success">You Won The Game </h2>';
	var losr='<h2 class="text text-danger">You Lost The Game </h2>';*/
	if(result==userchoice)
	{
		$('.coinBox').append('<h2 class="text text-success" style="font-size: 25px;">You Won.</h2>');
	}
	else
	{
		$('.coinBox').append('<h2 class="text text-danger" style="font-size: 25px;">You Lost! </h2>');
	}
}

//button click 
$(document).on('click','#btnFlip',function(){
	var flipr=$('.coinBox>div').addClass('flip');
	var number=Math.floor(Math.random()*2);
	$(this).attr('disabled','disabled');
	
	//$('.coinBox').html('<img src="head.jpg" width="240px" height="240px" /> <h3 class="text-primary">Head</h3>');  
		
setTimeout(function()
{
		flipr.removeClass('flip');
		
	if(number)
	{
		
			result='head';
			$('.coinBox').html('<img src="img/headimg.png" width="240px" height="240px"/> <h3 class="text-primary">Head</h3>');
		//alert('Head='+number);
	finalResult(result,userchoice);	
	resetAll();
	}
	else
	{ 
		result='tail';
		$('.coinBox').html('<img src="img/tailimg.png" width="240px" height="240px"/> <h3 class="text-primary">Tail</h3>');
		//alert('Tail='+number);
		finalResult(result,userchoice);
		resetAll();
	}
	},3000);
	
	return false;
	}
	);
