<?php
include "koneksi.php";

$username = $_GET['username'];
$password = $_GET['password'];

$query_profile = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
$cek = mysqli_fetch_assoc($query_profile);

session_start();
if(count($cek) === 0){
    header("location:index.php");
}
else{
    $_SESSION["user"] = $user;
    header("location:feed.php");
} 
?>