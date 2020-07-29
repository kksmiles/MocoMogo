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

      @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
.snip1344 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #ffffff;
  text-align: center;
  line-height: 1.4em;
  background-color: #141414;
}
.snip1344 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
}
.snip1344 .background {
  width: 100%;
  vertical-align: top;
  opacity: 0.2;
  -webkit-filter: grayscale(100%) blur(10px);
  filter: grayscale(100%) blur(10px);
  -webkit-transition: all 2s ease;
  transition: all 2s ease;
}
.snip1344 figcaption {
  width: 100%;
  padding: 15px 25px;
  position: absolute;
  left: 0;
  top: 50%;
}
.snip1344 .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 50%;
  left: 50%;
  max-width: 100px;
  opacity: 1;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(255, 255, 255, 0.5);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
}
.snip1344 h3 {
  margin: 0 0 5px;
  font-weight: 400;
}
.snip1344 h3 span {
  display: block;
  font-size: 0.6em;
  color: #f39c12;
  opacity: 0.75;
}
.snip1344 i {
  padding: 10px 5px;
  display: inline-block;
  font-size: 32px;
  color: #ffffff;
  text-align: center;
  opacity: 0.65;
}
.snip1344 a {
  text-decoration: none;
}
.snip1344 i:hover {
  opacity: 1;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
.snip1344:hover .background,
.snip1344.hover .background {
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
}

 #gamesDrop
    {
      color: white;
    }
    #gamesDrop:hover
    {
      color: black;
    }


    </style>

<script>
	$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
)
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
      
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        </div>
        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <br><br>
                      <figure class="snip1344">
	<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" alt="profile-sample1" class="background"/>
	
	<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" alt="profile-sample1" class="profile"/>
	<figcaption>
		<h3><?php echo $userName ?></h3>
		<span>Coin <?php echo $userCash?></span>
	</br>
		<a href="#">Account Settings</a>
	</figcaption>
</figure>


        </div>
        
        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          
                
              
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



