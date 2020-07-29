<?php  
session_start();
include('connect.php');

if(!isset($_SESSION['userID'])) 
{
  echo "<script>window.alert('Please Login First to Continue')</script>";
  echo "<script>window.location='Intro.php'</script>";
}
  $userID = $_SESSION['userID'];
  $query="SELECT * FROM user 
        WHERE userID = '$userID'";
  $ret=mysqli_query($con,$query);
    $count=mysqli_num_rows($ret);
    $arr=mysqli_fetch_array($ret);
    $userID=$arr[0];
    $userName=$arr[1];
    $userEmail=$arr[2];
    $userCash=$arr[4];



?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MocoMogo - Gamble </title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="css/agency.min.css" rel="stylesheet">
    <script  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"> </script>


    <style type="text/css">
    #bethelp
    {
      margin-left: 10px; 
    }
    #bethelp:hover
    {
      color: white;
    }
    #resultroulette
    {
      position: absolute;
      margin-top: 150px;
      margin-left: 175px;
      font-size: 2.2rem;
    }
    .multiplierButtons
    {
      width: 100%;

      height: 60px;
    }
     #userChoice
         {
      background: #2c2c32;
      width: 135px;
      height: 45px;
      padding-left: 10px;
      color: white;
      border:none;
      border-radius: 5px;
    }  
    #bet
    {
      background: #2c2c32;
      width: 135px;
      height: 45px;
      padding-left: 10px;
      color: white;
      border:none;
      border-radius: 5px;
    }    
    #txtheadortail
    {
      background: #2c2c32;
      width: 135px;
      height: 45px;
      padding-left: 10px;
      color: white;
      border:none;
      border-radius: 5px;
    }
    .roulettepointer
    {
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 15px 8px 0 8px;
      border-color: #c8354e transparent transparent transparent;
      position: absolute;
      margin-top: 355px;
      margin-left: 185px;

    }
    #timerlogs
    {
      width: 200px;
      text-align: center;
      color:#c8354e;
      position: absolute;
      font-size: 3rem;
      margin-top: 50px;
      margin-left: 10px;
    }
    #gamesDrop
    {
      color: white;
    }
    #gamesDrop:hover
    {
      color: black;
    }

    #chatNameOthers
    {
      font-size: 11px;

    }  
    #chatNameMe
    {
      font-size: 11px;
      float: right;

    }
    #chatMe
    {
      background-color: #45bcb2;
      color: black;
      margin-top: 8px;
      padding: 8px;
      border-radius: 15px;
      float: right;
      display:inline-block;



    }
    #chatOthers
    {
      background-color: #535971;
      color: white;
      margin-top: 8px;
      padding: 8px;
      border-radius: 15px;
      display:inline-block;

    }
      
    </style>

<script>

function submitChat() {
  if(form1.msg.value == '') {

    return;
  }
  var uname = form1.uname.value;
  var msg = form1.msg.value;
  var xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
    }
  }
  
  xmlhttp.open('GET','insertcoinchatlogs.php?uname='+uname+'&msg='+msg,true);
  xmlhttp.send();

}
function updateusercash()
{
  console.log("usercash in fun "+userCash);
  var xmlhttp = new XMLHttpRequest();  
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('cashlog').innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open('GET','updateusercash.php?userCash='+userCash,true);
  xmlhttp.send();

}
function updatebetlog()
{
  var bettype=document.getElementById("userChoice").value;
  console.log("bet type = "+bettype);
  var xmlhttp = new XMLHttpRequest();  
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('betlog').innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open('GET','insertbetlog.php?finalbetcash='+finalbetcash+'&bettype='+bettype+'&game=dice',true);
  xmlhttp.send();
}

$(document).ready(function(e){
  $.ajaxSetup({
    cache: false
  });
  
  setInterval( function(){ $('#timerlogs').load('timerlogscoin.php'); }, 200 );
  setInterval( function(){ $('#chatlogs').load('coinchatlogs.php'); }, 200 );
  setInterval( function(){ $('#resultcoin').load('resultcoin.php'); }, 200 );
  setInterval( function(){ $('#cashlog').load('cashlog.php'); }, 200 );
  setInterval( function(){ $('#headbetlog').load('betloghead.php'); }, 200 );
  setInterval( function(){ $('#tailbetlog').load('betlogtail.php'); }, 200 );

    setInterval(function(){

var messageBody = document.querySelector('#messageBody');
messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

},200);  
});

</script>

  </head>

  <body id="page-top" style="background-color:#26262c">

    <!-- Navigation -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">MocoMogo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="profile.php"><?php echo $userName ?></a>
            </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Games</a>
            <div class="dropdown-menu" style="background: #353a40;">
              <a id="gamesDrop" class="dropdown-item" href="Home.php">Roulette</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeBingo.php">Bingo</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeDice.php">Roll Dice</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeCoin.php">Flip-a-Coin</a>
            </div>
          </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="achievement.php">Achievements</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="yourcoin.php">Your Coins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php">Log-out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
        <div class="row">
      
            <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
            </div>
            
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
              <br><br>
              <div id="wrapper">
          <div class="container1">


            <div id="timerlogs"></div><br>
            <div id="resultcoin"></div>
          <div class="row">
          <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="coinBox" style="display:block;">
              <div class="tail" >
                <img src="img/tailimg.png" width="244px" height="244px" />
              </div>
              <div class="head">
                <img src="img/headimg.png" width="240px" height="240px"/>
              </div>              
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><br><br><br><br>
                <form>
                  <span><img src="img/money.png" style="width: 50px;height: 50px;"><span style="font-size: 2rem; color: #c8354e;" id="cashlog"></span></span> <br>             
                  <a id="bethelp" href="#" onclick="clearBet()"style="margin-left:0;text-decoration: none;">Clear</a>
                  <a id="bethelp" href="#" onclick="tenBet()"style="text-decoration: none;">+10</a>
                  <a id="bethelp" href="#" onclick="hundredBet()"style="text-decoration: none;">+100</a>
                  <a id="bethelp" href="#" onclick="thousandBet()"style="text-decoration: none;">+1k</a>
                  <a id="bethelp" href="#" onclick="tenThousandBet()"style="text-decoration: none;">+10k</a>
                  <a id="bethelp" href="#" onclick="halfBet()"style="text-decoration: none;">1/2</a>
                  <a id="bethelp" href="#" onclick="doubleBet()"style="text-decoration: none;">2x</a>
                  <a id="bethelp" href="#" onclick="maxBet()"style="text-decoration: none;">Max</a>
                  <br><br>
                  <input id="bet" type="text" name="" value="0" readonly="">
                  <input type="text" name="" id="userChoice">
<!--                 <select  class="form-control" id="userChoice" style="width:200px;">
                  <option value="">Select your side</option>
                  <option value="head" >Head</option>
                  <option value="tail">Tail</option>
                </select>       -->      
                  <button id="btnBet"onclick="ggbet();" type="button" class="btn btn-success">Bet</button>
                  
                </form>
            </div>
          </div><br><br><br>
          <div id="betlog">
            
          </div>
             <div class="row">
              <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="multiplierButtons btn btn-outline-primary" style="border-color: #45b5da;" onclick="choosehead()"  id="btnhead">head</button>
                    <div style="color: #45b5da; text-align: center; height: 150px; overflow: hidden;" id="headbetlog"></div>
              </div>
              <div class="col-xl-1 col-lg-6 col-md-12 col-sm-12 col-xs-12"></div>
              <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="multiplierButtons btn btn-outline-danger" style="border-color: #c8354e;" onclick="choosetail()"  id="btntail">tail</button>
                    <div style="color: #c8354e; text-align: center; height: 150px; overflow: hidden;" id="tailbetlog"></div>
              </div> 
            </div>
            <button name="btn1" class="btn btn-lg btn-primary" id="btnFlip" style="display: none;">Flip it</button>
        </div>
        <br />
      </div>
    </div>
     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="background-color: #1d1c22; height: 700px;">
      <div class="card text-white mb-3" style="background-color: #1d1c22; height: 500px;"  >
                <span style="text-align: center; margin-top: 20px; color: #fec61a; font-size: 1.3rem;">COIN CHATBOX</span>
                <div class="card-body" style="background-color: #1d1c22; width: 100%; overflow-y: hidden;" id="messageBody">
                    <div id="chatlogs">
                    LOADING CHATLOG...
                    </div>
                  </div>
              </div>
                    <form name="form1" id="chatForm">
                    <input id="chatInput" type="hidden" name="uname" value="<?php  echo $userName?>" /> <br />
                    <div class="card text-white mb-3" style="background-color: #1d1c22;">
                      <div class="card-body">
                      <input type="text" name="msg" id="messagebox" style="width: 83%; height: 100% ;">
                      <button id="sendButton" onclick="submitChat()">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       <section>





      </section>
      <footer style="background: white;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; MocoMogo 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/agency.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery.validate.min.js"></script>
    
    <script type="text/javascript">
                    var result,userchoice;
                    var betCash = 0;
                    var rollTotal=0;
                    var finalbetcash=0;
                    var userCash = <?php echo $userCash ?>;
                    console.log("User Cash = "+userCash);
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
                      if (betCash>userCash)
                      {
                        betCash=userCash;
                      }
                      document.getElementById("bet").value=betCash;

                    }
                    function maxBet()
                    {
                      betCash=userCash;
                      document.getElementById("bet").value=betCash;

                    }       
      function choosetail()
      {
        document.getElementById("userChoice").value="tail";
      }
      function choosehead()
      {
        document.getElementById("userChoice").value="head";
      }

      function ggbet()
      {


        finalbetcash = betCash;
        if(finalbetcash==0)
        {
          return;
        }
        else
        {
            userCash=userCash-finalbetcash;
            console.log("User Cash = "+userCash);
            console.log("User Bet = "+finalbetcash);
            updatebetlog();
            updateusercash();
            document.getElementById('btnhead').disabled = true; 
            document.getElementById('btntail').disabled = true; 
            document.getElementById("btnBet").style="display:none;";                     
        }
      }  

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
  var gg= document.getElementById("userChoice").value;
  console.log("result = " + result + " user choice = "+gg);
  console.log(result==gg);
  if(result==gg)
  {
    $('.coinBox').append('<h2 class="text text-success" style="font-size: 25px;">You Won.</h2>');
          userCash=userCash+(finalbetcash*2);
          var _23betcash = finalbetcash;
          console.log("User Cash after result"+userCash);
          setTimeout(function ()
          {
               updateusercash();
          }, 5000);
          finalbetcash=0;
  }
  else
  {
    $('.coinBox').append('<h2 class="text text-danger" style="font-size: 25px;">You Lost! </h2>');
  }
}

//button click 
$(document).on('click','#btnFlip',function(){
  var flipr=$('.coinBox>div').addClass('flip');
  var number=document.getElementById("resultcoin").innerText;
  $(this).attr('disabled','disabled');
  
  //$('.coinBox').html('<img src="head.jpg" width="240px" height="240px" /> <h3 class="text-primary">Head</h3>');  
    
setTimeout(function()
{
    flipr.removeClass('flip');
    
  if(number == "head")
  {
    
      result='head';
      $('.coinBox').html('<img src="img/headimg.png" width="240px" height="240px"/> <h3 class="text-primary">Head</h3>');

  var haha = document.getElementById("userChoice");
  finalResult(result,haha); 
  resetAll();
  }
  else
  { 
    result='tail';
    $('.coinBox').html('<img src="img/tailimg.png" width="240px" height="240px"/> <h3 class="text-primary">Tail</h3>');

  }
  },3000);
  
  return false;
  }
  );

    </script>

    <script type="text/javascript">



        $("#chatForm").submit(function (e) {
            e.preventDefault();
            $("#messagebox").val("").focus();
        });      

    $("#chatInput").keydown(function(e)
    {
             
            e.preventDefault();
            alert("call some function here");
      if(e.which==13)
      {
        $("#sendButton").click();
      }
    });
    </script>



  </body>

</html>



