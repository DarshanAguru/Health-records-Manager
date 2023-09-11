<?php 
session_start();
$cnt = 0;
$v = false;

if(!isset($_SESSION['userid']))
    {
        header("Location: index.php");
    }


if(isset($_SESSION['validate']))
{
    if($_SESSION['validate'] == 'YES')
    {
    header("Location: index.php");
    }
}



    include('conn.php');
    if($conn->connect_errno)
    {
        echo '<script> alert("Please try again! '.$conn->connect_error .' ");</script>';
        exit();
    }
   

    

if(isset($_POST['submit']))
{
  

    $usid = $_SESSION['userid'];
  $otp = $_POST['password'];

    
         
  

    // $sql = "INSERT INTO users (healthid,usname, passw, email,phone, age, gender)VALUES(?,?,?,?,?,?,?)";
    $sql  = "SELECT * FROM `usrotp` WHERE userid=? AND otp=?";
    $smt = $conn->prepare($sql);
   
    $smt->bind_param('ss', $usid,$otp);
    // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

    $smt->execute();
   
    // $_SESSION['userid']=$phone;
    $res = $smt->get_result();
    $r = $res->fetch_assoc();
    
    if($res->num_rows > 0)
    {
        $sql1  = "DELETE FROM `usrotp` WHERE userid=?";
        $smt = $conn->prepare($sql1);
       
        $smt->bind_param('ss', $usid);
        // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);
    
        $smt->execute();

      $_SESSION['validate'] = "YES";
      unset($_SESSION['count']);
      echo '<script>window.location.replace("index.php")</script>';

    }
    else{

        
        $v = true;
        if($_SESSION['count']> 2)
        {
            unset($_SESSION['count']);
            echo '<script> window.location.replace("logout_unvalid.php");</script>';
        }

      
    }
     
  }  



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="description" content="Health record maintenance">

  <meta name="keywords" content="Digital,health,records">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <link rel="shortcut icon" href="assets/img/icon/favicon.ico" >

  <title>HEALTH RECORDS</title>

  <link rel="stylesheet" href="assets/css/maicons.css">

  <link rel="stylesheet" href="assets/css/bootstrap.css">

  <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

 
  <header>
  

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/icon/png/logo-no-background11.png" height="50px">
          </a>

<!-- 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item">

              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            
          
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
                
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
        

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="login.php" class="active-nav"><center><b>Login</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="index.php">Home</a>
    <a href="blog.php">Dashboard</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About Us</a>
    
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bgimg.png);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">OTP VALIDATE</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">

    <div class="container">
     

     
      <form method="post" action="" class="contact-form mt-5">
       <?php
       if ($v)
       {
         echo '<p style="color:red;"> * Incorrect OTP * </p>';
         $_SESSION['count'] += 1;
         }
       ?> 
      
       
       
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="password"><b>OTP</b></label>
            <input type="text" name="password" pattern ="[0-9]*" id="password" maxlength="6" minlength="6" class="form-control" placeholder="OTP">
          </div>
          
        </div>
        <input name="submit" id="submit" type="submit" class="btn btn-primary wow zoomIn">
        <br>
        <br>
        <div><span style="color : black;">Time left : </span> <span id="timer"></span></div>
      </form>
      
     
    </div>
  </div>


  



  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>About</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
       
      
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <a href="#" class="footer-link">healthrecords@gmail.com</a>
         

        
        </div>
      </div>

      <hr>
<small>Made with ❤️ by team Health Records.</small>
      
    </div>
  </footer>


<script src="assets/js/jquery-3.5.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="assets/vendor/wow/wow.min.js"></script>

<script src="assets/js/google-maps.js"></script>

<script src="assets/js/theme.js"></script>


  <script src="assets/js/scripts.js"></script>

  <script>

  

    let timerOn = true;

function timer(remaining) {

  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
  
  window.location.replace("logout_unvalid.php");
}

timer(120);
    </script>
</body>
</html>     