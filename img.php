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
     
    $usid = $_SESSION['userid'];
    include('conn.php');
    if($conn->connect_errno)
    {
        echo '<script> alert("Please try again! '.$conn->connect_error .' ");</script>';
        exit();
    }
// echo '<script>alert("'.$_GET['imgid'].'")</script>';
    if(isset($_GET['imgid']))
    {
        $imgid = $_GET['imgid'];
        $query = "SELECT * FROM user_data WHERE imgid='$imgid' AND (userid='$usid'  OR uid= '$usid')";
        $res = $conn->query($query);
        if($res->num_rows>0)
        {
        $res = $res->fetch_assoc();
        $img_url = $res['files'];
        $title = $res['title'];
        $date = $res['date'];
        $report = ($res['recordtype'] == 'mr')?"Medical Report": "Lab Report";
        // echo '<script>alert("'.$img_url.'")</script>';
        //echo '<img src="'.'images/'.$img_url .'" alt="'.$img_url.'" />';
        }
    }
else{ 
    echo '<script>alert("No image(s) found...");</script>';
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

<style>

    .imageset{
        max-width: 1000px;
        max-height: 1000px;
        padding : 10px;
        border: 1px solid rgba(0,0,0,.4);
        border-radius: 10px;
        box-shadow: 0px 0px 2px 0px rgba(0,0,0,1);
    }
    .btn_prnt
    {
        margin-top : 20px;
        
    }
    
    .detials
    {
        background-color: #00D9A5;
        padding: 20px;
        padding-left: 30px;
        color: white;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.8);
    }
</style>
<script>
    function prnt()
    {
       var prtContent = document.getElementById("prnt");
var WinPrint = window.open('Print', 'Print', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
    }
</script>
 <header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/icon/png/logo-no-background11.png" height="50px">
          </a>
          </div>
          </nav>
    </header>

 

  <div class="page-section">
    <div class="container">
    <div id="prnt">    
    <div class="detials">
        <h2 style="margin-bottom: 10px; margin-left: 50px;">Title : <?php echo $title ?></h2>
        <p style="margin-bottom: 10px; margin-left: 50px;"> type : <?php echo $report ?></p>
        <p style="margin-bottom: 10px; margin-left: 50px;"> Date : <?php echo $date ?></p>
    </div>
    <!--<center>-->
    
 <?php echo '<img class="imageset" src="'.'images/'.$img_url .'" alt="'.$img_url.'" />'; ?>
</div>
 <!--</center>-->
 <div class="btn_prnt">
  <button class="btn btn-primary" type="button" onclick="prnt()" > Print</button>
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
