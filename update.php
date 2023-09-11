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

if(isset($_POST['updatedet']))
{
  
  $fname = validate($_POST['uname']);
  $email = validate($_POST['uemail']);
  $age = validate($_POST['uage']);

      try{
         
  

  
    $sql  = "UPDATE `users` SET name=? , age=?, email=? WHERE phone=?";
    $smt = $conn->prepare($sql);
   
    $smt->bind_param('ssss', $fname,$age,$email,$usid);
    // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

    $smt->execute();
   
    // $_SESSION['userid']=$phone;
    echo '<script>window.location.replace("dashboard.php");</script>';
      }
      catch (Exception $e)
      {
            // echo $e->getMessage();
          
              echo '<script> alert("Opps! some issue please try again later."); </script>';
              echo '<script> window.location.replace("dashboard.php");</script>';
          
      }
  }  
  
  else {
      echo '<script> window.location.replace("dashboard.php");</script>';
  }


    
?>