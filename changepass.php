<?php
session_start();
 if(!isset($_SESSION['userid']))
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
   
    $usid = $_SESSION['userid'];
function validate($val)
{
        $val = strip_tags(trim($val));
        $val = htmlspecialchars_decode($val);
        return $val;
}

if(isset($_POST['updatepass']))
{
  
  $pass = validate($_POST['upassword']);
  $cnfpass = validate($_POST['upasswordcnf']);


  if($pass != $cnfpass)
  {
    echo '<script>alert("Passwords did not matched! Try again...")</script>';
    echo '<script> window.location.replace("dashboard.php");</script>';
    
  }
//   echo '<script>alert( "'.$gender.' '. $fname .'" )</script>';
  
  else{
      try{
         
    $pass = md5($pass);

    // $sql = "INSERT INTO users (healthid,usname, passw, email,phone, age, gender)VALUES(?,?,?,?,?,?,?)";
    $sql  = "UPDATE `users` SET password=? WHERE phone=?";
    $smt = $conn->prepare($sql);
   
    $smt->bind_param('ss',$pass, $usid);
    // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

    $smt->execute();
   
    // $_SESSION['userid']=$phone;
    
    echo '<script>window.location.replace("logout.php");</script>';
      }
      catch (Exception $e)
      {
            // echo $e->getMessage();
          
              echo '<script> alert("already registered!"); </script>';
              echo '<script> window.location.replace("dashboard.php");</script>';
          
      }
  }  

}
else{
       echo '<script> window.location.replace("dashboard.php");</script>';
       
}
    
?>