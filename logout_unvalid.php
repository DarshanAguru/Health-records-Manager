<?php
session_start();
include('conn.php');
if($conn->connect_errno)
{
    echo '<script> alert("Please try again! '.$conn->connect_error .' ");</script>';
    exit();
}
$sql  = "DELETE FROM `usrotp` WHERE userid=?";
$smt = $conn->prepare($sql);

$smt->bind_param('s', $_SESSION['userid']);
// $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

$smt->execute();

unset($_SESSION['userid']);
unset($_SESSION['type']);
if(isset($_SESSION['validate']))
{
    unset($_SESSION['validate']);
}
session_destroy();  
echo '<script>alert("Opps!!! Please re-login.");</script>';
echo '<script>window.location.replace("index.php")</script>';
  
?>