<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'id19525572_database';
    $conn = new mysqli($host, $user, $pass, $db);
    if($conn->connect_errno)
    {
        echo '<script> alert("Please try again! '.$con->connect_error .' ");</script>';
        exit();
    }
    


?>