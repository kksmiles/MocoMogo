<?php
session_start();
include('connect.php');

if(!isset($_SESSION['userID']))
{
  echo "<script>window.alert('Please Login First to Continue')</script>";
  echo "<script>window.location='introMyanmar.php'</script>";
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

    <title>မိုကိုမိုဂို - ေလာင္းကစားနည္း </title>
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
    #betMultiplier
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
      font-size: 2rem;
      margin-top: 305px;
      margin-left: 95px;
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

function submitChat()
{
  if(form1.msg.value == '')
  {
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

  xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
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
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('betlog').innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open('GET','insertbetlog.php?finalbetcash='+finalbetcash+'&bettype='+betxtemp+'&game=roulette',true);
  xmlhttp.send();
}


$(document).ready(function(e){
  $.ajaxSetup({
    cache: false
  });

  setInterval( function(){ $('#timerlogs').load('timerlogsroulette.php'); }, 1000 );
  setInterval( function(){ $('#chatlogs').load('logs.php'); }, 200 );
  setInterval( function(){ $('#resultroulette').load('resultroulette.php'); }, 200 );
  setInterval( function(){ $('#cashlog').load('cashlog.php'); }, 200 );
  setInterval( function(){ $('#2xbetlog').load('betlog2xroulette.php'); }, 200 );
  setInterval( function(){ $('#3xbetlog').load('betlog3xroulette.php'); }, 200 );
  setInterval( function(){ $('#5xbetlog').load('betlog5xroulette.php'); }, 200 );
  setInterval( function(){ $('#20xbetlog').load('betlog20xroulette.php'); }, 200 );
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
          မာတိကာ
          <i class="fa fa-bars"></i>
        </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="profile.php"><?php echo $userName ?></a>
            </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">ဂိမ္းမ်ား</a>
            <div class="dropdown-menu" style="background: #353a40;">
              <a id="gamesDrop" class="dropdown-item" href="HomeMyanmar.php">၃၆ ဂဏန္းေလာင္းကစားနည္း</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeBingo.php">ဘင္ဂို</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeDiceMyanmar.php">အံစာတံုးလွိမ့္ျခင္း</a>
              <a id="gamesDrop" class="dropdown-item" href="HomeCoinMyanmar.php">အေႂကြေစ့ပစ္ေျမႇာက္ျခင္း</a>
            </div>
          </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="achievement.php">ေအာင္ျမင္မွုမ်ား</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="yourcoin.php">သင္၏ Coin မ်ား</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="logout.php">ထြက္ရန္</a>
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
          <div class="row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="timerlogs""></div>
                <div class="roulettepointer"></div>
                <div id="resultroulette" style="display: none;"></div>
                <img id="roulette" src="img/roulette.png" alt="Roulette">
                <button style="display: none;" id="Roll" onclick="rotateAnimation('roulette',5)">Roll</button>


              </div>
              <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br><br><br><br><br>
                <form>
                  <span><img src="img/money.png" style="width: 50px;height: 50px;"><span style="font-size: 2rem; color: #c8354e;" id="cashlog"></span></span> <br>
                  <a id="bethelp" href="#" onclick="clearBet()"style="margin-left:0;text-decoration: none;">ဘဲဥ</a>
                  <a id="bethelp" href="#" onclick="tenBet()"style="text-decoration: none;">+၁၀</a>
                  <a id="bethelp" href="#" onclick="hundredBet()"style="text-decoration: none;">+၁၀၀</a>
                  <a id="bethelp" href="#" onclick="thousandBet()"style="text-decoration: none;">+၁၀၀၀</a>
                  <a id="bethelp" href="#" onclick="tenThousandBet()"style="text-decoration: none;">+၁၀၀၀၀</a>
                  <a id="bethelp" href="#" onclick="halfBet()"style="text-decoration: none;">၁/၂</a>
                  <a id="bethelp" href="#" onclick="doubleBet()"style="text-decoration: none;">၂x</a>
                  <a id="bethelp" href="#" onclick="maxBet()"style="text-decoration: none;">အကုန္</a>
                  <br><br>
                  <input id="bet" type="text" name="" value="0" readonly="">
                  <input id="betMultiplier" type="text" name="" value="2x" readonly="">
                  <button id="btnBet"onclick="ggbet();" type="button" class="btn btn-success">ေလာင္းရန္</button>

                </form>
              </div>
            </div>
            <br><br><br>
            <div id="betlog"></div>
            <div class="row">
              <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="multiplierButtons btn btn-outline-secondary" style="border-color: #3f3f3f;" onclick="x2multiplier()"  id="btns2">၂ဆ</button>
                    <div style="color: #3f3f3f; text-align: center; height: 150px; overflow: hidden;" id="2xbetlog"></div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="multiplierButtons btn btn-outline-danger" style="border-color: #c8354e;" onclick="x3multiplier()"  id="btns3">၃ဆ</button>
                    <div style="color: #c8354e; text-align: center; height: 150px; overflow: hidden;" id="3xbetlog"></div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <button type="button" class="multiplierButtons btn btn-outline-primary" style="border-color: #45b5da;" onclick="x5multiplier()" id="btns5">၅ဆ</button>
                  <div style="color: #45b5da; text-align: center; height: 150px; overflow: hidden;" id="5xbetlog"></div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <button type="button" class="multiplierButtons btn btn-outline-warning" style="border-color: #ffc870;" onclick="x20multiplier()" id="btns20">၂၀ဆ</button>
                  <div style="color: #ffc870; text-align: center; height: 150px; overflow: hidden;" id="20xbetlog"></div>
              </div>
            </div>

                  <p></p>
                  <script type="text/javascript" src="jquery.js"></script>


                    <script type="text/javascript">

                    var looper;

                    var looper1;
                    var degrees=0;
                    var spin = 0;
                    var betCash = 0;
                    var result4Roulette=0;
                    var finalresult=0;
                    var windegree=0;
                    var finalbetcash=0;
                    var betxtemp=0;
                    var userCash = <?php echo $userCash ?>;
                    console.log("User Cash = "+userCash);



                    function rotateAnimation(el,speed)
                    {
                      // degrees = degrees+6.655;
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

                      if (degrees>359)
                      {

                        windegree = result4Roulette*6.655;
                        console.log("Final Result: "+finalresult+"x\n");
                        console.log("Win Degree : "+windegree);
                        degrees = 1;
                        spin++;
                      }
                      if (spin==2&&degrees==Math.ceil(windegree))
                      {
                        document.getElementById("resultroulette").style="display: block";
                        spin=0;
                        clearTimeout(looper);
                        setTimeout(function ()
                        {
                          clearBet();
                          document.getElementById("resultroulette").style="display: none";
                        }, 5000);
                      }
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
                          betxtemp = document.getElementById("betMultiplier").value;
                          updatebetlog();
                          updateusercash();

                          console.log("betxtemp = "+betxtemp);
                          document.getElementById('btns2').disabled = true;
                          document.getElementById('btns3').disabled = true;
                          document.getElementById('btns5').disabled = true;
                          document.getElementById('btns20').disabled = true;
                          document.getElementById("btnBet").style="display:none;";
                      }
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
                    function x2multiplier()
                    {

                      document.getElementById("betMultiplier").value="2x";

                    }    function x3multiplier()
                    {

                      document.getElementById("betMultiplier").value="3x";

                    }    function x5multiplier()
                    {

                      document.getElementById("betMultiplier").value="5x";

                    }    function x20multiplier()
                    {

                      document.getElementById("betMultiplier").value="20x";

                    }

                    function finalbet()
                    {
                      var temp = document.getElementById("betMultiplier").value;
                      console.log("bet multiplier = "+temp);
                      var temp1 = finalresult + "x";
                      console.log("Final result = "+temp1);
                      if (temp==temp1)
                      {
                        if (temp=="2x")
                        {
                          userCash=userCash+(finalbetcash*2);
                          var x2betcash = finalbetcash;
                          console.log("User Cash after result"+userCash);
                         setTimeout(function ()
                        {
                             updateusercash();
                        }, 8000);
                          finalbetcash=0;
                        }
                        else if (temp=="3x")
                        {
                          userCash=userCash+(finalbetcash*3);
                          console.log("User Cash after result"+userCash);
                        setTimeout(function ()
                        {
                             updateusercash();
                        }, 8000);
                          finalbetcash=0;

                        }
                        else if (temp=="5x")
                        {
                          userCash=userCash+(finalbetcash*5);
                          console.log("User Cash after result"+userCash);
                        setTimeout(function ()
                        {
                             updateusercash();
                        }, 8000);
                          finalbetcash=0;

                        }
                        else if (temp=="20x")
                        {
                          userCash=userCash+(finalbetcash*20);
                          console.log("User Cash after result"+userCash);
                         setTimeout(function ()
                        {
                             updateusercash();
                        }, 8000);
                          finalbetcash=0;

                        }

                      }
                      else{finalbetcash=0;}
                    }
                  </script>

                </form>




        </div>


        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="background-color: #1d1c22; height: 700px;">
          <div>

              <div class="card text-white mb-3" style="background-color: #1d1c22; height: 500px;"  >
                <span style="text-align: center; margin-top: 20px; color: #fec61a; font-size: 1.3rem;">၃၆ ဂဏန္းေလာင္းကစားနည္း စကားေျပာရန္ေနရာ</span><br><br>

                <div class="card-body" style="background-color: #1d1c22; width: 100%; overflow-y: hidden;" id="messageBody">
                    <div id="chatlogs">
                    လုပ္ေဆာင္ေနပါသည္...
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
                <a href="https://www.facebook.com/mocomogo.gamble/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2Fmoc_mog%2F&h=AT3_IzGNclDryQwj2_veBrf6nAABG-IsHXS4H_cRcsqObZVWfMvUkjjH-xzyV6947x1CzlBQsvSDi4yzULxSRfFkIR2fPZypruMIieApEr5Tv4NafjC2Po99RA">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="privacyMyanmar.php">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="pirvacyMyanmar.php">Terms of Use</a>
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
     $('#bethelp').click(function(ae)
     {

    alert("call some function here");
    ae.preventDefault();
  });



        $("#chatForm").submit(function (aae) {
            aae.preventDefault();
            $("#messagebox").val("").focus();
        });

    $("#chatInput").keydown(function(e)
    {

            e.preventDefault();
      if(e.which==13)
      {
        $("#sendButton").click();
      }
    });
    </script>



  </body>

</html>
