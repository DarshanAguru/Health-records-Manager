<?php
session_start();
    $vis = true;
    if(!isset($_SESSION['userid']))
    {
        $vis = false;
    }
    
        if(!isset($_SESSION['time']) && isset($_SESSION['userid']))
    {
        $_SESSION['time'] = time();
    }
    
    if(isset($_SESSION['time']) && (time() - $_SESSION['time'] > 600))
    {
        session_unset();
        session_destroy();
        
        // echo '<script> windows.location.replace("index.php")</script>';
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
          <?php 
            if($vis){
            echo '<li class="nav-item ">
              <a class="nav-link" href="blog.php">Dashboard</a>
            </li>';}
            
            ?>
            <li class="nav-item">

              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            
          
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            if(!$vis)
            {
              echo ' <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="login.php">Login</a>
            </li>';
            }
            ?>
                 <?php
            if($vis)
            {
              echo  '<li class="nav-item" >
                <a class="nav-link"  href="dashboard.php" style="border-radius: 32px; box-shadow: 0px 0px 2px #2D3B38;"><i class="fa fa-user"  aria-hidden="true"></i></a>
            </li>';
            
            }
            ?>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
        <!-- Top Navigation Menu -->
<div class="topnav">
  <a href="contact.php" class="active-nav"><center><b>Contact</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="index.php">Home</a>
    <a href="blog.php">Dashboard</a>
    <a href="about.php">About Us</a>
    <a href="login.php">Login</a>
    
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
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Contact</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Get in Touch</h1>

      <form  method = "post" action = "send_queries.php" class="contact-form mt-5">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="Name">Name</label>
            <input type="text" id="fname" name="fname" class="form-control" placeholder="Full name.." style="width : inherit;" required>
          </div>
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="emailAddress">Email</label>
            <input type="email" id="email" name = "email" class="form-control" placeholder="Email address.." style="width : inherit;" required>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="subject">Subject</label>
            <input type="text" id="subj" name = "subj" class="form-control" placeholder="Enter subject.." style="width : inherit;" required>
          </div>
          <div class="col-12 py-2 wow fadeInUp">
            <label for="message">Message</label>
            <textarea id="message" name= "message" class="form-control" rows="8" placeholder="Enter Message.." style="width : inherit;" ></textarea>
          </div>
        </div>
        <input type="submit" name ="submit" id="submit" class="btn btn-primary wow zoomIn" value="Send Message">
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


  
</body>
</html>