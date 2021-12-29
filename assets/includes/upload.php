<?php
session_start();
require_once 'connect.inc.php';

$id = $_SESSION['userProfileID'];



$file = $_FILES['userImage'];
$fileName = $_FILES['userImage']['name'];
$fileTmpName = $_FILES['userImage']['tmp_name'];
$fileSize = $_FILES['userImage']['size'];  
$fileError = $_FILES['userImage']['error'];
$fileType = $_FILES['userImage']['type'];


$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg', 'png', 'jpeg');

if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 2000000){
            $fileNameNew = "profile".$id. "." . $fileActualExt;
            $fileDestination = '../img/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            $sql = "UPDATE profileimg SET statusimg = 1 WHERE userProfileID = ". $id.";";
            $result = mysqli_query($conn, $sql);
            header('Location: ../../myProfile.php');
        }
        else{
            echo "file is to big";
        }
    }
    else{
        echo "there was an eroor uploading this file";
    }
}

else{
    echo " you cannot upload files of this type";
}


// 