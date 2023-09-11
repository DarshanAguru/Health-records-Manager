<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['type']);
if(isset($_SESSION['validate']))
{
    unset($_SESSION['validate']);
}
session_destroy();  

echo '<script>alert("Logged Out! Thank you for using our service");</script>';
echo '<script>window.location.replace("index.php")</script>';
  
?>