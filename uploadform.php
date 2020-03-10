<?php
//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.
include "koneksi.php";
session_start();


if($conn) {
    echo "Connected";
}       
    if(isset($_POST['uploadfilesub'])) {
        $url = $_POST['url'];
        $caption = $_POST['caption'];
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = 'images/';

        move_uploaded_file($filetmpname, $folder.$filename);
            
$sql = "INSERT INTO `photo` (`url`,`image`,`caption`)  VALUES ('$url','$filename','$caption')";
   
$qry = mysqli_query($conn,  $sql);
if( $qry) {
    echo "</br>image uploaded"; 
}
}

?>
 
 
<!DOCTYPE html>
<html>
    <style>
        body {
           text-align : center;
           margin-top : 15%;
        }
    </style>
<body>
<!--Make sure to put "enctype="multipart/form-data" inside form tag when uploading files -->

<form action="profile.php" method="post" enctype="multipart/form-data" >
    <input type="text" name="url" placeholder="url"><br>
    <input type="text" name="Write your caption here" placeholder="caption"><br>
    <input type="file" name="uploadfile" />
    <input type="submit" name="uploadfilesub" value="upload" />
</form>

</form>
</body>
</html>