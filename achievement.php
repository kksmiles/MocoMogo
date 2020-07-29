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
    #gamesDrop
    {
      color: white;
    }
    #gamesDrop:hover
    {
      color: black;
    }
  </style>


  </head>

  <body id="page-top" style="background-color:#27262c">
  <div id="overlay" onclick="chatMinimize()"> </div>

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
    </nav>
   
        
      <div class="container">
        <br><br><br>
        <h3>Roulette</h3>
		<div class="row">        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 coinss.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>

          </div><br>
          </div>
       		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Win 3 games in a row in playing dice (1500 coins)
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Share Our Page on FACEBOOK for 1500 coins
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
		</div><br><br>
        <h3>Roulette</h3>
		<div class="row">        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play roulette 5 times and earn 500 coins
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>

          </div><br>
          </div>
       		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Win 3 games in a row in playing roulette (1500 coins)
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Follow Our page on instagram and earn (1500 coins)
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
		</div><br><br>
        <h3>Roulette</h3>
		<div class="row">        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>

          </div><br>
          </div>
       		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
		</div><br><br>
        <h3>Roulette</h3>
		<div class="row">        
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>

          </div><br>
          </div>
       		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="card" style="width:350px">
            <div class="card-body">
              <p class="card-text">
                Play dice 5 time and earn 500 Points.
              </p>
              <button class="btn btn-primary" style="float:right;color:black">Claim</button>
            </div>
          </div><br>
          </div>
		</div><br><br>

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



  </body>

</html>



