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

if($_SESSION['triggerBingoNumber']=="GO")
{
    // $result4Roulette = $_SESSION['resultRoulette'];
    // echo $result4Roulette;
      echo "<script>
          
      </script>";

}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MocoMogo - Gamble </title>
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
  <link rel="stylesheet" type="text/css" href="bingoCSS.css" />


    <style type="text/css">
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
    .scrollbar {
    margin-left: 30px;
    float: left;
    height: 300px;
    width: 65px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
}
.force-overflow {
    min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #4285F4; }


.scrollbar-default::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-default::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-default::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #2BBBAD; }

      
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
  
  xmlhttp.open('GET','insertbingochatlogs.php?uname='+uname+'&msg='+msg,true);
  xmlhttp.send();

}

$(document).ready(function(e){
  $.ajaxSetup({
    cache: false
  });
  
  setInterval( function(){ $('#timerlogsbingo').load('timerlogsbingo.php'); }, 200 );
  setInterval( function(){ $('#timerlogsbingonumber').load('timerlogsbingonumber.php'); }, 200 );
  setInterval( function(){ $('#resultbingo').load('resultbingo.php'); }, 200 );
  setInterval( function(){ $('#chatlogs').load('bingochatlogs.php'); }, 200 );
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
            <div id="content">
    <span id="resultbingo" class="circle">&nbsp; </span>
    <p id="towin" class="win">5 to go</p>
    
    <table id="bingotable">
      <tr>
        <th class="orange">B</th>
        <th class="orange">I</th>
        <th class="orange">N</th>
        <th class="orange">G</th>
        <th class="orange">O</th>
      </tr>
      <tr>
        <td><span class="dot" id="square0"> &nbsp; </span></td>
        <td> <span class="dot" id="square1"> &nbsp; </span></td>
        <td> <span class="dot" id="square2"> &nbsp; </span></td>
        <td> <span class="dot" id="square3"> &nbsp; </span></td>
        <td> <span class="dot" id="square4"> &nbsp; </span></td>
      </tr>
      <tr>
        <td> <span class="dot" id="square5"> &nbsp; </span></td>
        <td> <span class="dot" id="square6"> &nbsp; </span></td>
        <td> <span class="dot" id="square7"> &nbsp; </span></td>
        <td> <span class="dot" id="square8"> &nbsp; </span></td>
        <td> <span class="dot" id="square9"> &nbsp; </span></td>
      </tr>
      <tr>
        <td> <span class="dot" id="square10"> &nbsp; </span></td>
        <td> <span class="dot" id="square11"> &nbsp; </span></td>
        <td> <span class="dot" id="square12"> &nbsp; </span></td>
        <td> <span class="dot" id="square13"> &nbsp; </span></td>
        <td> <span class="dot" id="square14"> &nbsp; </span></td>
      </tr>
      <tr>
        <td> <span class="dot" id="square15"> &nbsp; </span></td>
        <td> <span class="dot" id="square16"> &nbsp; </span></td>
        <td> <span class="dot" id="square17"> &nbsp; </span></td>
        <td> <span class="dot" id="square18"> &nbsp; </span></td>
        <td> <span class="dot" id="square19"> &nbsp; </span></td>
      </tr>
      <tr>
        <td> <span class="dot" id="square20"> &nbsp; </span></td>
        <td> <span class="dot" id="square21"> &nbsp; </span></td>
        <td> <span class="dot" id="square22"> &nbsp; </span></td>
        <td> <span class="dot" id="square23"> &nbsp; </span></td>
        <td> <span class="dot" id="square24"> &nbsp; </span></td>
      </tr>
    </table>
    <button style="display: none;" id="btncall" onclick="call()">Call number</button><br>
    <div id="timerlogsbingo"></div>
    <div id="timerlogsbingonumber"></div>
    
  </div>
        </div>
        
        
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" style="background-color: #1d1c22; height: 870px;">
          <div>
              <div class="card text-white mb-3" style="background-color: #1d1c22; height: 730px;"  >
            
                <div class="card-body scrollbar" style="background-color: #1d1c22; width: 94%;" id="scrollcard">
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
  var number=new Array(25);
  var number2=number;
  var count=0;
  var temp0=0,temp1=0,temp2=0,temp3=0,temp4=0,temp5=0,temp6=0,temp7=0,temp8=0,temp9=0,temp10=0,temp11=0;
  for(var j=0;j<25;j++)
  {
    var current="square"+j;
  var num=Math.floor((Math.random()*75)+1);
    for(var i=0;i<=j;i++)
    {
      if(num==number[i])
      {
      num=Math.floor((Math.random()*75)+1);
      i=0;
      }
      
    }
    number[j]=num;
      document.getElementById(current).innerHTML=number[j];
    }
    
    
    function call()
    {
      var hue="rgb("+Math.floor(Math.random()*256+150)+","+(Math.floor(Math.random()*256))+","+(Math.floor(Math.random()*256))+")";
      document.getElementById("resultbingo").style.background=hue;
      var callnum = document.getElementById("resultbingo").innerText;
      
      console.log(callnum);
      for(var i=0;i<25;i++)
      {
      
        if(number[i]==callnum)
        {
          number2[i]=0;
          document.getElementById("square"+i).style.backgroundColor="#777070";
          win();
        }
      }
    }
    
    
    
    function win()
    {
      if(number2[0]==0&&number2[1]==0&&number2[2]==0&&number2[3]==0&&number2[4]==0)
      {
        temp0++;
      }
      if(number2[5]==0&&number2[6]==0&&number2[7]==0&&number2[8]==0&&number2[9]==0)
      {
        temp1++;
      }    
      if(number2[10]==0&&number2[11]==0&&number2[12]==0&&number2[13]==0&&number2[14]==0)
      {
        temp2++;
      }
      if(number2[15]==0&&number2[16]==0&&number2[17]==0&&number2[18]==0&&number2[19]==0)
      {
        temp3++;
      }
      if(number2[20]==0&&number2[21]==0&&number2[22]==0&&number2[23]==0&&number2[24]==0)
      {
        temp4++;
      }  
         
       if(number2[0]==0&&number2[5]==0&&number2[10]==0&&number2[15]==0&&number2[20]==0)
       {
        temp5++;
       }
       if(number2[1]==0&&number2[6]==0&&number2[11]==0&&number2[16]==0&&number2[21]==0)
       {
        temp6++;
       }
       if(number2[2]==0&&number2[7]==0&&number2[12]==0&&number2[17]==0&&number2[22]==0)
       {
        temp7++;
       }  
       if(number2[3]==0&&number2[8]==0&&number2[13]==0&&number2[18]==0&&number2[23]==0)
       {
        temp8++;
       }
       if(number2[4]==0&&number2[9]==0&&number2[14]==0&&number2[19]==0&&number2[24]==0)
       {
        temp9++;
       }  
       if(number2[0]==0&&number2[6]==0&&number2[12]==0&&number2[18]==0&&number2[24]==0)
       {
        temp10++;
       }  
        if(number2[4]==0&&number2[8]==0&&number2[12]==0&&number2[16]==0&&number2[20]==0)
       {
        temp11++;
       }  
       
       if(temp0==1)
       {
        count++;
       }
       if(temp1==1)
       {
        count++;
       }
       if(temp2==1)
       {
        count++;
       }
       if(temp3==1)
       {
        count++;
       }
       if(temp4==1)
       {
        count++;
       }
       if(temp5==1)
       {
        count++;
       }
       if(temp6==1)
       {
        count++;
       }
       if(temp7==1)
       {
        count++;
       }
       if(temp8==1)
       {
        count++;
       }
       if(temp9==1)
       {
        count++;
       }
       if(temp10==1)
       {
        count++;
       }
       if(temp11==1)
       {
        count++;
       }
       check();
       
    }

    function check()
    {  
        
        if(count==0)
        {
          document.getElementById("towin").innerHTML="5 to go";
        }
        if(count==1)
        {
          document.getElementById("towin").innerHTML="4 to go";
        }
        else if(count==2)
        {
          document.getElementById("towin").innerHTML="3 to go";
        }
        else if(count==3)
        {
          document.getElementById("towin").innerHTML="2 to go";
        }
        else if(count==4)
        {
          document.getElementById("towin").innerHTML="1 to go";
        }
        else if(count>=5)
        {
          document.getElementById("towin").innerHTML="Bingo";
          alert("Bingo");
        }
    }   
      
    
  </script>
    <script type="text/javascript">

    var objDiv = document.getElementById("scrollcard");
    objDiv.scrollTop = objDiv.scrollHeight;

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



