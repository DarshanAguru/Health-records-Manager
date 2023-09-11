<?php


session_start();
// error_reporting(0);
 if(!isset($_SESSION['userid']))
    {
        header("Location: index.php");
    }
    // echo '<script>alert("'.$_SESSION['userid'].'");</script>';
    //    $host = 'localhost';
    // $user = 'root';
    // $passw = '';
    // $db = 'test';
    // $conn = new mysqli($host, $user, $passw, $db);

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
        // $val = mysqli_real_escape_string($conn,$val);
        return $val;
}

if(isset($_POST['submit']))
{
  
  $title = validate($_POST['title']);
    $dte = $_POST['dte'];
    $rt = validate($_POST['recordtype']);
    $filename = $_FILES['files']["name"];
    $filetype =pathinfo($filename,PATHINFO_EXTENSION);
    $tmp = $_FILES['files']["tmp_name"];
    
    $folder = "/storage/ssd4/572/19525572/public_html/images/".$filename;
    $frmt = array('jpg','jpeg','png');
    if(in_array($filetype, $frmt))
    {
    if(move_uploaded_file($tmp,$folder))
        {
           
            try{
         
        

                    // $sql = "INSERT INTO users (healthid,usname, passw, email,phone, age, gender)VALUES(?,?,?,?,?,?,?)";
                    $sql  = "INSERT INTO `user_data` (userid,title,date,files,recordtype, imgid, uid) VALUES ('".$_SESSION['userid']."', '$title', '$dte', '$filename','$rt', '".md5($filename)."' , '".$_SESSION['userid']."')";
                    $smt = $conn->query($sql);  
                    echo '<script> alert("Record added successfully")</script>';
                    
                    // echo '<script>window.location.replace("login.php");</script>';
            }
                      catch (Exception $e)
                      {
                            // echo $e->getMessage();
                          
                              echo '<script> alert("already Uploaded that file."); </script>';
                            //   echo '<script> window.location.replace("add_record.php");</script>';
                          
                      }
        }
        else{
            echo '<script> alert("Opps! unable to upload please try again...")</script>';
        }
    }
    else{
        echo '<script>alert("invalid Format.. (only jpeg, jpg & png)")</script>';
    }

    // Get images from the database
// $query = $conn->query("SELECT * FROM `user_data`");

// if($query->num_rows > 0){
//     while($row = $query->fetch_assoc()){
//         $imageURL = 'images/'.$row["files"];

//     echo '<img src="'. $imageURL .'" alt="" />';
//  }
// }else{ 
//     echo '<p>No image(s) found...</p>';
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
          
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
    <!-- Top Navigation Menu -->
<div class="topnav">
  <a href="javascript:void(0)" class="active-nav"><center><b>Add Record</b></center></a>
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
            <li class="breadcrumb-item active" aria-current="page">Add Record</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Add Record</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Please fill the details</h1>

      <form method="post" action="" class="contact-form mt-5" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInRight">
            <label for="Title"><b>Title</b></label>
            <input type="text" id="title" name ="title" class="form-control" placeholder="Title" required>
          </div>
          </div>
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="Date"><b>Date</b></label>
            <input type="date" id="dte" name ="dte" class="form-control" required>
          </div>
          </div>
          <div class="row mb-3">
          <div class="col-sm-6 py-2 wow fadeInLeft">
            <label for="option"><b>Record type</b></label>
            <select name="recordtype" id="recordtype" class="form-control">
                <option value="mr">Medical Record</option>
                <option value = "lr">Lab Report</option>
            </select>
            <!-- <input type="date" id="dte" name ="dte" class="form-control" required> -->
          </div>
          </div>
          <div class = "row mb-3">
            <div class ="col-sm-6 py-2 wow fadeInRight">    
             <label for="fileUpload" class="form-label"><b>Upload File</b></label>
            <input class="form-control" type="file" id="files" name="files" value="" required>
            <small>*Currently only .jpeg, .jpg & .png are supported.<small>
            </div>
        </div>
        <input type="submit" id="submit" name ="submit" value = "Add Record" class="btn btn-primary wow zoomIn">
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