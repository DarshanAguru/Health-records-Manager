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

  <!-- Back to top button  -->
  <div class="back-to-top"></div>

  <header>



    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
      
          <img src="assets\img\icon\png\logo-no-background11.png" height="50px">
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
            <li class="nav-item active">

              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            
          
            <li class="nav-item">
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
  <a href="index.php" class="active-nav"><center><b>Home</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="blog.php">Dashboard</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About Us</a>
    <a href="login.php">Login</a>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
  </header>

  <div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bgimg.png);">
    <div class="hero-section">
      <?php
      if(!$vis){
        echo '
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let\'s make your life Easier</span>
        <h1 class="display-4">Digitalize your health records</h1>
        <a href="register.php" class="btn btn-primary">Register Now!</a>
      </div>';
      }
      else 
      {
        echo '
        <div class="container text-center wow zoomIn">
        <span class="subhead">Let\'s make your life Easier</span>
        <h1 class="display-4">Digitalize your health records</h1>
        <p class="subhead">Go to your dashboard now!!!</p>
        <a href="blog.php" class="btn btn-primary">Dashboard</a>
        </div>
        ';
      }
      ?>
    </div>
  </div>


 

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Digital Health Wallet</h1>
            <p class="text-grey mb-4">virtual wallet that contains all yout health reports. Health Record (HR) is an electronic version of a patients medical history, that is maintained by...</p>
            <a href="about.php" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="assets/img/icon/png/logo-no-background.png" style="width: 300px; height:300px;" alt="health record manager"> 
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  

  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
       
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
         
            <div class="header">
              <a href="javascript:void(0)" class="post-thumb">
                <img src="assets/img/test1.png" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="register.php">Now Labs can Also Register and add lab recports directly to their patients Health record ID's!!! </a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span>Team Health Records</span>
                </div>
                <span class="mai-time"></span> just now
              </div>
            </div>
          </div>
        </div>
       
<div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
         
            <div class="header">
              <a href="javascript:void(0)" class="post-thumb">
                <img src="assets/img/test2.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="javascript:void(0)">Now you can take the prints  of your records when you view them!!!</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span>Team Health Records</span>
                </div>
                <span class="mai-time"></span> Few days ago
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="register.php" class="btn btn-primary">Register as Lab</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Send us any Queries</h1>

      <form action = "send_queries.php" method = "post" class="main-form">
        <div class="row mt-5 ">
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
    
            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" style="width : inherit;" required>
            
        
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" style="width : inherit;" required>
          </div>
          <!-- <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="dte" id="dte" class="form-control">
          </div> -->
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="subj" id="subj" class="form-control" placeholder="Subject"  style="width : inherit;" reuqired>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.." style="width : inherit;"></textarea>
          </div>
        </div>

        <input type="submit" value="send" id="submit" name="submit" class="btn btn-primary mt-3 wow zoomIn">
      </form>
    </div>
  </div> <!-- .page-section -->


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

<script src="assets/js/theme.js"></script>

<script src="assets/js/scripts.js"></script>

  
  
</body>
</html>