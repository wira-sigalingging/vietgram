<?php
    include "koneksi.php";
    $query_profile = mysqli_query($conn, "UPDATE profile SET username ='".$_POST["username"]."',name = '".$_POST["name"]."', email ='".$_POST["email"]."', website ='".$_POST["web"]."',bio ='".$_POST["bio"]."',phone_number ='".$_POST["phonenumber"]."',gender ='".$_POST["gender"]."'");
    $query_user = mysqli_query($conn, "UPDATE user SET username = '".$_POST["username"]."',email = '".$_POST["email"]."'");

    session_start();

    
    $_SESSION["user"]["username"] = $_POST["username"];
    $_SESSION["user"]["email"] = $_POST["email"];

    $_SESSION["profile"] = $_POST;

    header('Location: profile.php');
?>