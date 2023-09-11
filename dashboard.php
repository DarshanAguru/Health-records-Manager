<?php
session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: index.php");
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
    
    $type = $_SESSION['type'];
    
    $usid = $_SESSION['userid'];
    include('conn.php');
    if($conn->connect_errno)
    {
        echo '<script> alert("Please try again! '.$conn->connect_error .' ");</script>';
        exit();
    }
   
   $name = "";
   $age = "";
   $gender = "";
   $id = "";
   $email = "";
   
   
   
 $sql  = "SELECT * FROM `users` WHERE phone='$usid'";
    $smt = $conn->query($sql);
   
    // $_SESSION['userid']=$phone;
    $res = $smt->fetch_assoc();
    
    if(count($res) > 0)
    {
        $name = $res['name'];
        $age = $res['age'];
        $gender=$res['gender'];
        $id = $res['phone'];
        $email = $res['email'];
   

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
    
    
    <script>
        function edit()
        {
            var e = document.getElementsByName('edit')[0];
            e.hidden = true;
            var f = document.getElementsByClassName('hde')[0];
            f.hidden = true;
            var h = document.getElementsByClassName('frm')[0];
            h.hidden = false;
            var d = document.getElementsByName('cpass')[0];
            d.hidden = true;
        }
        
         function changepass()
        {
            var e = document.getElementsByName('edit')[0];
            e.hidden = true;
            var f = document.getElementsByClassName('hde')[0];
            f.hidden = true;
              var d = document.getElementsByName('cpass')[0];
            d.hidden = true;
            var h = document.getElementsByClassName('passchange')[0];
            h.hidden = false;
        }
        
        function logout()
        {
            window.location.replace("logout.php");
        }
    </script>

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
            
            <li class="nav-item ">
              <a class="nav-link" href="blog.php">Dashboard</a>
            </li>
            <li class="nav-item">

              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            
          
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link"  href="dashboard.php" style="border-radius: 32px; box-shadow: 0px 0px 2px #2D3B38;"><i class="fa fa-user"  aria-hidden="true"></i></a>
            </li>
           
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
            <!-- Top Navigation Menu -->
<div class="topnav">
  <a href="dashboard.php" class="active-nav"><center><b>Profile</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="index.php">Home</a>
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

  <div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bgimg.png);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Profile</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section ">
    <div class="container">

    <div class="card text-center" style="box-shadow: 0px 0px 15px #2D3B38;">
  <div class="card-header">
    PROFILE
  </div>
  
  <div class="passchange" hidden>
          <form  method = "post" action = "changepass.php">
            
     <center>    
<div class="input-group mb-3" style="width : 40%">
  <span class="input-group-text" id="inputGroup-sizing-default">User id  </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $id ?>" readonly>
</div>
         
<div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text"  id="inputGroup-sizing-default">Password  </span>
  <input name = "upassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
</div>
        
        <div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text"  id="inputGroup-sizing-default"> Confirm Password </span>
  <input name = "upasswordcnf" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
</div>


</center>
              
          <input type = "submit" name = "updatepass" class = "btn btn-outline-success" value = "submit">
          </form>
              <br>
          
          <a href="dashboard.php">Back</a>
      </div>
  
  
  <div class="card-body">
      <div class="frm" hidden>
          <form  method = "post" action = "update.php">
            
     <center>    
<div class="input-group mb-3" style="width : 40%">
  <span class="input-group-text" id="inputGroup-sizing-default">User id  </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $id ?>" readonly>
</div>
         
<div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text"  id="inputGroup-sizing-default">Name  </span>
  <input name = "uname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $name ?>" >
</div>
        
        <div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text"  id="inputGroup-sizing-default">Email </span>
  <input name = "uemail" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $email ?>">
</div>

<div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text"  id="inputGroup-sizing-default">Age </span>
  <input name = "uage" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $age ?>">
</div>
         
<div class="input-group mb-3"  style="width : 40%">
  <span class="input-group-text" id="inputGroup-sizing-default">Gender </span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value = "<?php echo $gender ?>" readonly>
</div>
</center>
              
          <input type = "submit" name = "updatedet" class = "btn btn-outline-success" value = "submit">
          </form>
          <br>
          
              <a href ="dashboard.php">Back</a>
      </div>
      <div class="hde">
       <p><b>User ID (phone no.) :</b> <?php echo $id; ?></p>
      <p><b>Name : </b><?php echo $name; ?></p>
    <p><b>Email :</b> <?php echo $email; ?></p>
     <p><b>Gender :</b> <?php echo $gender; ?></p>
     <p><b>Age :</b> <?php echo $age; ?></p>
         
     </div>
    
  </div>
  <div class="card-footer text-muted">
      
    <button class="btn btn-outline-success" name = "edit" value="edit" onclick="edit()">Edit</button>
     <button class="btn btn-outline-success" name = "cpass" value="change" onclick="changepass()">Change Password</button>
          <button class="btn btn-outline-success" name = "cpass" value="change" onclick="logout()">Logout</button>
  </div>
</div>

 
 
   
    </div> <!-- .container -->
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