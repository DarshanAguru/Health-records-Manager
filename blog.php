<?php
session_start();
    if(!isset($_SESSION['userid']))
    {
        header("Location: index.php");
    }
    
    if(!isset($_SESSION['type']))
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
   

function validate($val)
{

        $val = strip_tags(trim($val));
        $val = htmlspecialchars_decode($val);
        // $val = mysqli_real_escape_string($conn,$val);
        return $val;
}
// $ll =(isset($_POST['lab']))?'true':'false';
// $mm = (isset($_POST['rep']))?"true":'false';
// $d = (isset($_POST['dte']))?$_POST['dte']:"";
// echo '<script>
// var d = document.getElementById("dte");
//   d.value = "'.$d.'";
//   var lr = document.getElementById("lab");
//   lr.checked = '.$ll.';
//   var mr = document.getElementById("rep");
//   mr.checked = '.$mm.';
// </script>';

if(isset($_POST['clear']))
{
  unset($_POST['submit']);
  unset($_POST['rep']);
  unset($_POST['lab']);
  unset($_POST['date']);
  echo '<script>window.location.replace("blog.php");</script>';
}
if(isset($_POST['submit']))
{

    

  unset($_POST['clear']);
  $lr = '';
  $mr='';

  // echo '<script>alert("'.$_POST['dte'].'")</script>';

  $dte = $_POST['dte'];

  
  $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid' OR uid = '$usid') ORDER BY date DESC";
  // echo '<script>
  // var d = document.getElementById("dte");
  //   d.value = "'.$dte.'";
  //   var lr = document.getElementById("lab");
  //   lr.checked = '.isset($_POST['lab']).';
  //   var mr = document.getElementById("rep");
  //   mr.checked = '.isset($_POST['rep']).';
  // </script>';

  if(isset($_POST['dte']) && $dte!= '')
  {
      
      $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid' ) AND date = '$dte' ORDER BY date DESC";
      unset($_POST['submit']);
  }
  
  if(isset($_POST['lab']))  
    {
      $lr = 'lr';
      $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid') AND recordtype = '$lr' ORDER BY date DESC";
      if(isset($_POST['dte']) && $dte != '')
      {
      $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid') AND date = '$dte' AND (recordtype = '$lr') ORDER BY date DESC";
      }
      unset($_POST['submit']);

      // echo '<script>alert("2")</script>';
      
    }
  if(isset($_POST['rep']))
  {
    $mr = 'mr';
    $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid') AND  recordtype = '$mr' ORDER BY date DESC";
    if(isset($_POST['dte']) && $dte != '')
    {
    $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid') AND date= '$dte' AND (recordtype = '$mr') ORDER BY date DESC";
    }
    unset($_POST['submit']);
    // echo '<script>alert("3")</script>';
    
  }


 

  // echo $lr."<br>";
  // echo $mr."<br>";
  // echo $dte."<br>";
    // if(in_array($filetype, $frmt))
    // {
    // if(move_uploaded_file($tmp,$folder))
    //     {
           
    //         try{
         
        

    //                 // $sql = "INSERT INTO users (healthid,usname, passw, email,phone, age, gender)VALUES(?,?,?,?,?,?,?)";
    //                 $sql  = "INSERT INTO `user_data` (userid,title,date,files,recordtype) VALUES ('".$_SESSION['userid']."', '$title', '$dte', '$filename','$rt')";
    //                 $smt = $conn->query($sql);  
    //                 echo '<script> alert("Record added successfully")</script>';
                    
    //                 // echo '<script>window.location.replace("login.php");</script>';
    //         }
    //                   catch (Exception $e)
    //                   {
    //                         // echo $e->getMessage();
                          
    //                           echo '<script> alert("already Uploaded that file."); </script>';
    //                         //   echo '<script> window.location.replace("add_record.php");</script>';
                          
    //                   }
    //     }
    //     else{
    //         echo '<script> alert("Opps! unable to upload please try again...")</script>';
    //     }
    // }
    // else{
    //     echo '<script>alert("invalid Format.. (only jpeg, jpg & png)")</script>';
    // }

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
else{
  
  $sql2 = "SELECT * FROM `user_data` WHERE (userid = '$usid'  OR uid= '$usid') ORDER BY date DESC";
  // echo '<script>alert("4")</script>';

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
            <li class="nav-item active">
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
          '<li class="nav-item" >
                <a class="nav-link"  href="dashboard.php" style="border-radius: 32px; box-shadow: 0px 0px 2px #2D3B38;"><i class="fa fa-user"  aria-hidden="true"></i></a>
            </li>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
            <!-- Top Navigation Menu -->
<div class="topnav">
  <a href="blog.php" class="active-nav"><center><b>Dashboard</b></center></a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="index.php">Home/a>
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
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Dashboard</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section ">
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container-fluid">
    <form method = "post" action ="" class="d-flex" >
    <input class="form-inline ml-3 p-2" type="date" name="dte" id="dte" style="border-radius: 8px;" >
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
      <section class="form-inline   ml-3" >
      <input  type="checkbox" name="lab" id="lab" value="lr" class="form-check mr-2"> <b>Lab Reports</b>
  </section>
  <section class="form-inline ml-3 mr-3" >
      <input type="checkbox" name="rep" id="rep" value="mr" class="form-check mr-2"> <b>Medical Reports</b>
  </section>
      <input name="submit" id="submit" value="search" class="form-inline btn btn-primary ml-1" type="submit">
      <input name="clear" id="clear" value="clear" class="form-inline btn btn-primary ml-1" type="submit">
    </form>
    <hr style="width:2px; height: 40px; color:black; background:black;margin-right: 20px;"/>
    <?php
        if($type=="lab")
        {
            echo '<a href="add_record_lab.php" class="btn btn-primary"><b>+ Add Record</b></a>';
        }
        else{
            echo '<a href="add_record.php" class="btn btn-primary"><b>+ Add Record</b></a>';
        }
    ?>
    <!--<a href="add_record.php" class="btn btn-primary"><b>+ Add Record</b></a>-->
    </div>
    
    
</nav>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Date</th>
      <th scope="col">Record Type</th>
      <th scope="col">File </th>
      <?php 
        if ($type=="lab"){
            echo '<th scope="col">Patient ID </th>';
        }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php 
      $query = $conn->query($sql2);

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imgid = $row["imgid"];
        $title= $row["title"];
        $date = $row["date"];
        $rt = ($row["recordtype"] == 'lr')?'Lab Record':'Medical Report';
        $uid = $row["uid"];
      echo '<tr>';
    echo '<td>'.$title.'</td>';
    echo '<td>'.$date.'</td>';
    echo '<td>'.$rt.'</td>';
    echo '<td><a href="img.php?imgid='.$imgid.'" target="_blank"><u>Click here!</u></a></td>';
    if($type == 'lab')
    {
        echo '<td>'.$uid.'</td>'; 
    }
    echo '</tr>';
 }
}
?>
    <!-- <tr>
    
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Jacob</td>
    </tr>
    <tr>
    
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Jacob</td>
    </tr>
    <tr>
    <td>Jacob</td>
      <td>Larry the Bird</td>
      <td>@twitter</td>
      <td>Jacob</td>
    </tr> -->
  </tbody>
</table>
 
   
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