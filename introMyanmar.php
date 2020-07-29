<?php
session_start();
include('connect.php');

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
    echo "<script>window.alert('Email သို႔မဟုတ္ စကားဝွက္ မွားယြင္းေနပါသည္။')</script>";
    echo "<script>window.location='introMyanmar.php'</script>";
  }
  else
  {
    $_SESSION['userID']=$arr[0];
    $_SESSION['userName']=$arr[1];


    echo "<script>window.alert('မိုကိုမိုဂို မွႀကိဳဆိုပါသည္။ သင္၏ေလာင္းကစား ခရီးစဥ္ကို ယခုစတင္လိုက္ပါ။')</script>";
    echo "<script>window.location='HomeMyanmar.php'</script>";
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
    echo "<script>window.alert('ဤ mail ျဖင့္ အေကာင့္ဖြင့္ၿပီးပါၿပီ။')</script>";
    echo "<script>window.location='introMyanmar.php'</script>";
  }
  else if ($userPassword!=$ConfirmPassword)
  {
    echo "<script>window.alert('စကားဝွက္ မတူညီပါ။')</script>";
    echo "<script>window.location='introMyanmar.php'</script>";
  }
  else
  {
    $insert = "INSERT INTO
          user (userEmail,userPassword,userName,userCash)
          VALUES ('$userEmail','$regfinalpass','$userName',5000)";
    $ret = mysqli_query ($con,$insert);
      if($ret)
    {
      echo "<script>window.alert('သင္၏ အေကာင့္ ေအာင္ျမင္စြာ ဖြင့္ၿပီးပါၿပီ။ ေက်းဇူျပဳ၍ ဆက္လက္ ဝင္ေရာက္ပါ။')</script>";
      echo "<script>window.location='introMyanmar.php'</script>";
    }
    else
    {
      echo "<p>အေကာင့္ ဖြင့္ရာတြင္ တစ္ခုခုမွားယြင္းေနပါသည္။ " . mysqli_error($con) . "</p>";
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

    <title>မိုကိုမိုဂို - ေလာင္းကစားနည္း </title>

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
        မာတိကာ
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal" href="#login">ဝင္ရန္</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">ဝန္ေဆာင္မႈမ်ား</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#games">ဂိမ္းမ်ား</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#aboutus">ကၽြႏု္ပ္တို႔၏အေၾကာင္း</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">ဆက္သြယ္ရန္</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">ဘာသာစကားမ်ား</a>
               <div class="dropdown-menu" style="background: #353a40;">
                 <a id="gamesDrop" class="dropdown-item" href="Intro.php">အဂၤလိပ္</a>
                 <a id="gamesDrop" class="dropdown-item" href="introMyanmar.php">ျမန္မာ</a>
               </div>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">မိုကိုမိုဂိုမွႀကိဳဆိုပါသည္!</div>
          <div class="intro-heading text-uppercase"> ဘဝ ကဲ့သို႔ ေလာင္းကစား </div>
          <div class="intro-heading "> ေလာင္းကစား ကဲ့သို႔ ဘဝ </div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger text-dark" data-toggle="modal" data-target="#exampleModal" href="#register" >စတင္ရန္</a>
        </div>
      </div>
    </header>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">စတင္ရန္</h5>
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
                    <a data-toggle="tab" class="nav-link active" href="#log-in">ဝင္ရန္</a>
                  </li>
                  <li>
                    <a data-toggle="tab" class="nav-link" href="#sign-up">အေကာင့္ဖြင့္ရန္</a>
                  </li>
              </ul>
              </nav>
            </div>
            <div class="tab-content">
                <div id="log-in" class="card tab-pane fade in active" >
                    <form action="introMyanmar.php" method="post" class="card-body">
                      <div class="form-group">
                        <label for="txtemail"> Email လိပ္စာ </label>
                        <input type="email" class="form-control" name="txtemail" placeholder="Email လိပ္စာရိုက္ရန္" required/>
                      </div>
                      <div class="form-group">
                        <label for="txtpassword"> စကားဝွက္ </label>
                        <input type="password" name="txtpassword" class="form-control" placeholder="စကားဝွက္ရိုက္ရန္" required/>
                        </div>
                      <input  type="submit" class="btn btn-dark" name="btnLogin" value="ဝင္ရန္"/>

                 </form>
              </div>

         <div id="sign-up" class="card tab-pane fade" >
          <form class="card-body"action="introMyanmar.php" method="post">

                    <div class="form-group">
                        <label for="txtEmail"> Email လိပ္စာ</label>
                        <input type = "email" class="form-control" name="txtEmail" placeholder = "Email လိပ္စာရိုက္ရန္" required/>
                        <small id="emailHelp" class="form-text text-muted">ကၽြႏ္ုပ္တို႔သည္ သင္၏ Email အားမည္သူမွမေပးပါ</small>
                    </div>
                    <div class="form-group">
                        <label for="txtUserName"> နာမည္</label>
                        <input type = "text" class="form-control" name="txtUserName" placeholder = "နာမည္ရိုက္ရန္" required/>

                    </div>
                    <div class="form-group">
                        <label for="txtPassword"> စကားဝွက္</label>
                        <input type = "password" class="form-control" name="txtPassword" placeholder = "စကားဝွက္ရိုက္ရန္" required/>
                    </div>
                    <div class="form-group">
                        <label for="txtConfirmPassword"> စကားဝွက္ ျပန္ရိုက္ရန္ </label>
                        <input type = "password" class="form-control" name="txtConfirmPassword" placeholder = "စကားဝွက္ ျပန္ရိုက္ရန္" required/>
                    </div>
                    <input type = "submit" name="btnRegister" value ="စာရင္းသြင္းရန္"  class="btn btn-dark"/>


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
            <h2 class="section-heading text-uppercase">ဝန္ေဆာင္မႈမ်ား</h2>
            <h3 class="section-subheading text-muted">သင့္ရဲ႕ ေပ်ာ္ရႊင္ဖြယ္ကစားနည္းမ်ားကို အခုပဲရယူလိုက္ပါ</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <img alt="" src="img/deposit.png">
            <h4 class="service-heading">ေငြလႊဲလား?</h4>
            <p class="text-muted">ဂိမ္းကစားရန္အတြက္ coin မ်ားကို ဝယ္မည္ဆိုလၽွင္ သင့္ရဲ႕ေငြကို payment method မ်ားစြာႏွင့္ ေပးေခ်ျခင့္ျဖင့္ စတင္လိုက္ပါ။ သင့္အတြက္ ကၽြႏု္ပ္တို႔ ပဏာမ အေနျဖင့္ coin ၅၀၀၀ ထည့္သြင္းေပးထားပါသည္။ </p>
          </div>
          <div class="col-md-4">
                <img alt="" src="img/earn.png">
            <h4 class="service-heading"> ေငြဝင္ေအာင္ဘယ္လိုလုပ္မလဲ? </h4>
            <p class="text-muted">အေကာင္းဆံုး ဆံုးျဖတ္ခ်က္ေတြ၊ တြက္ခ်က္မႈေတြနဲ႔ ေဆာ့ကစားျခင္းျဖင့္ coin ေတြရယူလိုက္ပါ။ ယခု ကြန္ယက္ ေပၚမွာ ရွိေသာ ကစားနည္းမ်ားစြာကို ကိုယ့္နည္းကိုယ့္ဟန္ႏွင့္ ေဆာ့ကစားျခင္းျဖင့္ ရယူလိုက္ပါ။</p>
          </div>
          <div class="col-md-4">
                <img alt="" src="img/withdraw.png">
            <h4 class="service-heading">Coin ကေန ေငြသားဘယ္လိုျပန္လည္ရယူမလဲ?</h4>
            <p class="text-muted">ေဆာ့ကစားျခင္းျဖင့္ ခက္ခက္ခဲခဲ ရယူထားေသာ သင္ရဲ႕ coin ေတြကို ေငြသားအျဖစ္ credit card ထဲသို႔ ျပန္လည္ ေျပာင္းေရြ႕ ထည့္သြင္းႏိုင္ပါသည္။ သင္ေဆာ့ကစားျခင္းျဖင့္ ေငြမ်ားတစ္က်ပ္ မက်န္ သင့္အတြက္ ထိုက္တန္သည္ဆိုတာ မေမ့ပါႏွင္။ </p>
          </div>
        </div>
      </div>

    </section>

    <section id="games">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">ဂ္ိမ္းမ်ား</h2>
            <h3 class="section-subheading text-muted">က်ြနု္ပ္တို့ သည္ သင့္အား ေငြဝင္ရန္ ကစားနည္း ၄ မ်ိဳး ေပးထားမည္၊၊</h3>
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
                    <h4>၃၆ ဂဏန္းေလာင္းကစားနည္း</h4>
                    <h4 class="subheading">၂ဆ ၃ဆ ၅ဆ ၁၀ဆ </h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">ဆံုလည္ရဲ႕ အစိတ္အပိုင္းေတြျဖစ္တဲ့ ဂဏန္းေတြေပၚ မွာ မူတည္ၿပီးေလာင္းႏိုင္ပါသည္။ဆံုလည္ရဲ႕ လည္ျခင္းၿပီးဆံုးသည့္အခါ ရလာသည့္ ရလဒ္ေတြေပၚ မူတည္၍ သင့္ရဲ႕ အႏိုင္အရံႉးကို တြက္ခ်က္ ႏိုင္ပါသည္။ဆံုလည္သည္ စကၠန္႔ ၂၀ တိုင္း လည္ေနပါမည္။
သင္ရဲ႕ ေလာင္းထားမႉမ်ားကို အျခားေသာ ကစားသူမ်ားႏွင့္ ေဆြးေႏြးေျပာဆိုႏိုင္ရန္ စာပို႔ရန္ ေနရာ ထားရွိေပးထားပါသည္။ </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/coin.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>အေႂကြေစ့ပစ္ေျမႇာက္ျခင္း </h4>
                    <h4 class="subheading">ေခါင္းလား (သို႔) ပန္းလား? </h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">႐ိုးရွင္းပါတယ္ ! ေခါင္း (သို႔) ပန္း တစ္ခုမွ ႀကိဳက္ႏွစ္သက္ရာကိုေရြး၍ ေလာင္းႏိုင္ပါသည္။အေႂကြေစ့သည္ စကၠန္႔ ၂၀တိုင္း ပစ္ေျမႇာက္သည္။သင္ရဲ႕ ေလာင္းထားမႉမ်ားကို အျခားေသာ ကစားသူမ်ားႏွင့္ ေဆြးေႏြးေျပာဆိုႏိုင္ရန္ စာပို႔ရန္ ေနရာ ထားရွိေပးထားပါသည္။ </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/dice.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>အံစာတံုးလွိမ့္ျခင္း </h4>
                    <h4 class="subheading">၂ မွ ၁၂  </h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">အံစာတုံုး ပစ္ျခင္းမွ ရလာမည့္တန္ဖိုးကို ခန္႔မွန္း၍ေလာင္းရပါမည္။မ်ားျပားလွေသာ ေရြးျခယ္မႉမ်ား ထားရွိေပးထားပါသည္။သင္ရဲ႕ ေလာင္းထားမႉမ်ားကို အျခားေသာ ကစားသူမ်ားႏွင့္ ေဆြးေႏြးေျပာဆိုႏိုင္ရန္ စာပို႔ရန္ ေနရာ ထားရွိေပးထားပါသည္။</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/bingo.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>ဘင္ဂို </h4>
                    <h4 class="subheading">လက္မွတ္တစ္ေစာင္ရယူလိုက္ပါ!</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">သင့္ရဲ႕ points ေတြကို အသံုးျပဳၿပီးလက္မွတ္တစ္ေစာင္ဝယ္ယူပါ။ သင့္ကို ေဆာ့ရန္ စာရြက္တစ္ရြက္ ကၽြႏ္ူပ္တို႔ ဘက္မွေပးလာပါမည္။၅စကၠန္႔တစ္ႀကိမ္ နံပါတ္မ်ားကို ေၾကညာေပးသည့္အတြက္ စိတ္လႉပ္ရွားမႉရသကို ခုပဲ ခံစားရန္ ေဆာ့လိုက္ပါစို႔!</p>
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
            <h2 class="section-heading text-uppercase">ကၽြႏု္ပ္တို႔၏အေၾကာင္း</h2>
            <h3 class="section-subheading text-muted">ဝင္ေရာက္ျခင္းအတြက္ ေက်းဇူးတင္ပါသည္၊၊ </h3>
            <p>ယင္း website ကို သတင္းအခ်က္အလက္နည္းပညာတကၠသိုလ္ ဒုတိယႏွစ္ရွိ အခန္း(ခ) အဖြဲ႔(၄) မွ Javascript စီမံကိန္းအတြက္ တည္ေဆာက္ထားျခင္းျဖစ္ပါသည္။
              <br>
              အဖြဲ႔၀င္မ်ား
              <br>- မေမစံပယ္မ်ိဳး
              <br>- မျမတ္ဟုန္သီ
              <br>- မျမတ္သီရိခန္႔

              <br>- ေမာင္ေကာင္းခန္႔
              <br>- ေမာင္ခ်မ္းမင္းျမတ္
              <br>- ေမာင္ျပည့္စံုေအာင္
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
            <h2 class="section-heading text-uppercase">ဆက္သြယ္ရန္</h2>
            <h3 class="section-subheading text-muted">ကၽြႏု္ပ္တို့ သည္ သင္၏ တံု့့ျပန္မွု အတြက္ ေက်းဇူးတင္ပါသည္၊၊</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="သင္၏ အမည္*" required="required" data-validation-required-message="အမည္ရိုက္ရန္">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="သင္၏ Email *" required="required" data-validation-required-message="Email လိပ္စာရိုက္ရန္">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="သင္၏ ဖုန္း *" required="required" data-validation-required-message="ဖုန္းနံပါတ္ ရိုက္ရန္ ">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="စာပို့ရန္ *" required="required" data-validation-required-message=""></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase text-dark" type="submit">ပို့ရန္</button>
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
                <a href="privacyMyanmar.php">လံုျခံဳမွု</a>
              </li>
              <li class="list-inline-item">
                <a href="privacyMyanmar.php">အသံုးျပဳပံု</a>
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
