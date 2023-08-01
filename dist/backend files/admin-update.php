<?php

include("connection.php");
include("functions.php");
session_start();

if(isset($_POST["submit"])){
    $uid = 2; // change to $_SESSION['userID'];
    // echo $_POST["email-edit"];
    // echo $_POST["mobile-edit"];
    // echo $_POST["address-edit"];

    $email = $_POST["email-edit"];
    $mobile = $_POST["mobile-edit"];
    $address = $_POST["address-edit"];

    $query = "UPDATE `admin` set email = '".$email."', mobile_number = '".$mobile."', address = '".$address."' where doctorID='".$uid."';";
    $result = mysqli_query($con, $query);
    
    if($result)
    {
        header("location:../admin-profile.php");
    }
    else{
        header("location:../admin-profile-edit.php?update error");
    }
    
}

