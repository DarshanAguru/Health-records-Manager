<?php
session_start();
 if(isset($_SESSION['userid']))
    {
        header("Location: index.php");
    }
    //    $host = 'localhost';
    // $user = 'root';
    // $passw = '';
    // $db = 'test';
    // $conn = new mysqli($host, $user, $passw, $db);

    include('conn.php');
    if($conn->connect_errno)
    {
        echo '<script> alert("Please try again! '.$conn->connect_error .' ");</script>';
        exit();
    }
   

function validate($val)
{
        $val = strip_tags(trim($val));
        $val = htmlspecialchars_decode($val);
        return $val;
}

if(isset($_POST['submit']))
{
  
  $fname = validate($_POST['fullName']);
  $email = validate($_POST['emailAddress']);
  $phone = validate($_POST['phone']);
  $age = validate($_POST['age']);
  $pass = validate($_POST['password']);
  $cnfpass = validate($_POST['repassword']);
    $gender = validate($_POST['gender']);
    $lab = $_POST['lab'];

    if($lab == 'yes')
    {
        $lab = 'lab';
    }
    else
    {
        $lab = 'user';
    }
  if($pass != $cnfpass)
  {
    echo '<script>alert("Passwords did not matched!")</script>';
    
  }
//   echo '<script>alert( "'.$gender.' '. $fname .'" )</script>';
  
  else{
      try{
         
    $pass = md5($pass);

    // $sql = "INSERT INTO users (healthid,usname, passw, email,phone, age, gender, type)VALUES(?,?,?,?,?,?,?)";
    $sql  = "INSERT INTO `users` (phone,email,name,age,gender,password, type) VALUES(?,?,?,?,?,?,?)";
    $smt = $conn->prepare($sql);
   
    $smt->bind_param('sssssss', $phone,$email,$fname,$age,$gender,$pass,$lab);
    // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

    $smt->execute();
   
    // $_SESSION['userid']=$phone;
    echo '<script>window.location.replace("login.php");</script>';
      }
      catch (Exception $e)
      {
            // echo $e->getMessage();
          
              echo '<script> alert("already registered!"); </script>';
              echo '<script> window.location.replace("login.php");</script>';
          
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
  <a href="register.php" class="active-nav"><center><b>Register</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="index.php">Home</a>
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

  <div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bgimg.png   );">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Register</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Please fill the detials</h1>

      <form method="POST" action="" class="contact-form mt-5">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="fullName"><b>Name</b></label>
            <input type="text" id="fullName" name ="fullName" class="form-control" placeholder="Full name.." required>
          </div>
          </div>
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="emailAddress"><b>Email</b></label>
            <input type="email" id="emailAddress" name="emailAddress" class="form-control" placeholder="Email address.." required>
          </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-6 py-2 wow fadeInRight">
              <label for="phone"><b>Contact no.</b></label>
              <input type="tel" pattern="[0-9]{10}" minlength="10" maxlength="10" id="phone" name="phone" class="form-control" placeholder="Contact no." title="Enter valid phone number." required>
              <small>format : 1234567890 (Exclude +91)</small>
            </div>
            </div>
              <div class="row mb-3">
            <div class="col-sm-6 py-2 wow fadeInRight">
              <label for="age"><b>Age</b></label>
              <input type="text" pattern="[0-9]{1,}"  maxlength="3" id="age" name="age" class="form-control" placeholder="Age" title="Enter valid age." required>
             
            </div>
            </div>
                <div class="row mb-3">
            <div class="col-sm-6 py-2 wow fadeInRight">
              <label for="gender"><b>Gender</b></label>
              <br>
              <table>
                  <tr>
                      <td class="col-sm-1 py-2 wow">
<input type="radio" name="gender" id="genderM"  value="male" required> Male
</td>
<td class="col-sm-1  py-2 wow">
<input type="radio" name="gender" id="genderF"  value="female"> Female
</td>
<td class="col-sm-1 py-2 wow">
<input type="radio" name="gender" id="genderO" value="others"> Others
            </td>
            </tr>
             </table>
            </div>
            </div>
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password.."   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <small>Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters.</small>
          </div>
          </div>
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="repassword"><b>Re-Enter password</b></label>
            <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Re-Enter Password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <small>Should match with the above password.</small>
          </div> 
        
        </div>
        <div class="row mb-3" style="margin-left: 10px;">
          Check this for Lab registration: <input type="checkbox" value="yes" name="lab" id="lab" style="margin-left: 20px;"> 
        </div>
        <input type="submit" id="submit" name ="submit" class="btn btn-primary wow zoomIn">
      </form>
      <p style="margin-left: 10%;"> Already Registered? <a href="login.php"><u>Login</u></a> </p>
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