<?php
session_start();
include('connect.php');
if(isset($_SESSION['userID']))
{
  echo "<script>window.location='Home.php'</script>";
}
if(isset($_POST['btnLogin']))
{
  $txtemail=$_POST['txtemail'];
  $txtpassword=$_POST['txtpassword'];
  $finalpass = md5($txtpassword);

  $query="SELECT * FROM user
      WHERE userEmail='$txtemail'
      AND userPassword='$finalpass'";
  $ret=mysqli_query($con,$query);
  $count=mysqli_num_rows($ret);
  $arr=mysqli_fetch_array($ret);

  if($count==0)
  {
    echo "<script>window.alert('Email or Password Incorrect.')</script>";
    echo "<script>window.location='Intro.php'</script>";
  }
  else
  {
    $_SESSION['userID']=$arr[0];
    $_SESSION['userName']=$arr[1];


    echo "<script>window.alert('Welcome to MocoMogo : Let's start your gambling journey)</script>";
    echo "<script>window.location='Home.php'</script>";
  }
}

if (isset($_POST['btnRegister']))
{
  $userEmail=$_POST['txtEmail'];
  $userName=$_POST['txtUserName'];
  $userPassword=$_POST['txtPassword'];
  $ConfirmPassword=$_POST['txtConfirmPassword'];


  $query = "SELECT * FROM user WHERE userEmail='$userEmail'";
  $ret =mysqli_query ($con,$query);
  $count = mysqli_num_rows($ret);
  $regfinalpass = md5($userPassword);

  if ($count!=0)
  {
    echo "<script>window.alert('You've already made an account with the email')</script>";
    echo "<script>window.location='Intro.php'</script>";
  }
  else if ($userPassword!=$ConfirmPassword)
  {
    echo "<script>window.alert('The passwords do not match.')</script>";
    echo "<script>window.location='Intro.php'</script>";
  }
  else
  {
    $insert = "INSERT INTO
          user (userEmail,userPassword,userName,userCash)
          VALUES ('$userEmail','$regfinalpass','$userName',5000)";
    $ret = mysqli_query ($con,$insert);
      if($ret)
    {
      echo "<script>window.alert('Your account has been successfully created. Please login to continue')</script>";
      echo "<script>window.location='Intro.php'</script>";
    }
    else
    {
      echo "<p>Something went wrong in Signing Up : " . mysqli_error($con) . "</p>";
    }


  }

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
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

    <link href="css/agency.min.css" rel="stylesheet">

    <style>
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

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">MocoMogo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal" href="#login">Log-in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#games">Games</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Languages</a>
               <div class="dropdown-menu" style="background: #353a40;">
                 <a id="gamesDrop" class="dropdown-item" href="Intro.php">English</a>
                 <a id="gamesDrop" class="dropdown-item" href="introMyanmar.php">Myanmar</a>
               </div>
             </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To MocoMogo!</div>
          <div class="intro-heading text-uppercase"> Life is a Gamble </div>
          <div class="intro-heading "> Gambling is life </div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger text-dark" data-toggle="modal" data-target="#exampleModal" href="#register" >Get Started</a>
        </div>
      </div>
    </header>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Get Started</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <section id="getstarted" class="">
      <div class="container bg-dark">
      <div class="card";">
        <div class="card-body">
            <div class="container">
              <nav class="nav navbar-nav">
                <ul class="nav nav-tabs nav-lg">
                  <li class="active">
                    <a data-toggle="tab" class="nav-link active" href="#log-in">Log-in</a>
                  </li>
                  <li>
                    <a data-toggle="tab" class="nav-link" href="#sign-up">Sign-up</a>
                  </li>
              </ul>
              </nav>
            </div>
            <div class="tab-content">
                <div id="log-in" class="card tab-pane fade in active" >
                    <form action="Intro.php" method="post" class="card-body">
                      <div class="form-group">
                        <label for="txtemail"> Email Address </label>
                        <input type="email" class="form-control" name="txtemail" placeholder="Enter Email" required/>
                      </div>
                      <div class="form-group">
                        <label for="txtpassword"> Password </label>
                        <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password" required/>
                        </div>
                      <input  type="submit" class="btn btn-dark" name="btnLogin" value="Login"/>

                 </form>
              </div>

         <div id="sign-up" class="card tab-pane fade" >
          <form class="card-body"action="Intro.php" method="post">

                    <div class="form-group">
                        <label for="txtEmail"> Email address</label>
                        <input type = "email" class="form-control" name="txtEmail" placeholder = "Enter Email" required/>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="txtUserName"> User Name</label>
                        <input type = "text" class="form-control" name="txtUserName" placeholder = "Enter UserName" required/>

                    </div>
                    <div class="form-group">
                        <label for="txtPassword"> Password </label>
                        <input type = "password" class="form-control" name="txtPassword" placeholder = "Enter Password" required/>
                    </div>
                    <div class="form-group">
                        <label for="txtConfirmPassword"> Confirm-Password </label>
                        <input type = "password" class="form-control" name="txtConfirmPassword" placeholder = "Re-enter Password" required/>
                    </div>
                    <input type = "submit" name="btnRegister" value ="Register"  class="btn btn-dark"/>


              </form>

         </div>
         </div>

        </div>
      </div>
      </div>
    </section>
      </div>
    </div>
  </div>
</div>



    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">Start Your Gambling Journey</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <img alt="" src="img/deposit.png">
            <h4 class="service-heading">Deposit</h4>
            <p class="text-muted"> Start out your gambling journey by first depositing your own money through serveral payment methods to purchase points. Don't worry, We give you initial 5000 coins to start out. </p>
          </div>
          <div class="col-md-4">
                <img alt="" src="img/earn.png">
            <h4 class="service-heading"> Earn </h4>
            <p class="text-muted"> Start earning through smart decisions and calculations on gambling. Gamble your way through several games available through the web.</p>
          </div>
          <div class="col-md-4">
                <img alt="" src="img/withdraw.png">
            <h4 class="service-heading">Withdraw</h4>
            <p class="text-muted">Exchange your hard-earnt points with cash back into your credit card. Just remember that you deserve every single penny earnt through here. </p>
          </div>
        </div>
      </div>

    </section>

    <section id="games">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Games</h2>
            <h3 class="section-subheading text-muted">We've provided 4 games where you can play and earn</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/rouletteintro.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Roulette</h4>
                    <h4 class="subheading">2x 3x 5x 10x</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Bet on the parts of the roulette where your winnings will be multiplied according to landings of the roulette. The roulette will spin every 20 seconds. You can chat with other people and discuss about your bets too. </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/coin.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Flip a Coin</h4>
                    <h4 class="subheading">Head or Tail?</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Simeple! Just bet on either side. A coin will be flipped every 20 seconds. You can chat with other people and discuss about your bets too. </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/dice.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Roll Dice</h4>
                    <h4 class="subheading">Two to Twelve </h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Bet on the value of the dice thrown. Several options are available. You can chat with other people and discuss about your bets too.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/bingo.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Bingo</h4>
                    <h4 class="subheading">Get a ticket</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Buy a ticket using your points. A random sheet will be given. Feel the excitement throughout the game as we announce a number every 5 seconds.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </section>


    <section class="bg-light" id="aboutus">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <h3 class="section-subheading text-muted">Thank you for visiting our website </h3>
            <p> This website is developed as the project for javascript group 4 of section B (UIT)
              <br>Members
              <br>-May Sabal Myo
              <br>-Myat Hanthi
              <br>-Myat Thiri Khant
              <br>-Kaung Khant
              <br>-Chan Min Myat
              <br>-Pyae Sone Aung
            </p>
          </div>
        </div>

        </div>
      </div>
    </section>


    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">We appreciate your feedback.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Enter Name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Enter Email Address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Enter Phone Number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase text-dark" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
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
                <a href="privacy.php">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="privacy.php">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>


<!--     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>


 -->
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery.validate.min.js"></script>

  </body>


</html>
