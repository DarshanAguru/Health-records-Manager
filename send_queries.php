<?php
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
    $fname = validate($_POST['fname']);
    $email = validate($_POST['email']);
    $subj = validate($_POST['subj']);
    $msg = validate($_POST['message']);
   
    $sql  = "INSERT INTO `feedback` (fname,email,subj,msg) VALUES(?,?,?,?)";
    
    try{
    $smt = $conn->prepare($sql);
   
    $smt->bind_param('ssss',$fname,$email, $subj, $msg);
    // $smt->bind_param('sssssss',$phone, $fname, $pass, $email, $phone, $age,$gender);

    $smt->execute();
    echo '<script> alert("Query sent! Thank you... We will work on it ASAP..."); </script>';
    echo '<script>window.location.replace("index.php");</script>';
    unset($_POST['submit']);
    }
    catch (Exception $e)
    {
        echo '<script> alert("Error! We are working on it..."); </script>';
        unset($_POST['submit']);
        echo '<script> window.location.replace("index.php"); </script>';
    }

}
?>