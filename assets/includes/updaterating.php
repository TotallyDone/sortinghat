<?php
session_start();
include_once "connect.inc.php";
$id = $_SESSION['userProfileID'];
$GetID = $_GET["id"];
$sqlHouse = "SELECT * FROM house WHERE HouseID = " . $GetID;
    $resultHouse = mysqli_query($conn , $sqlHouse);
    while ($row = mysqli_fetch_array($resultHouse)){
        $Gry = $row['HouseGry'];
        $Raven = $row['HouseRaven'];
        $Slyth = $row['HouseSlyth'];
        $Huff = $row['HouseHuff'];


if (isset($_POST["submit-Gry"])) {
   $Gry = $Gry + 1;
   $sqlUpdate = "UPDATE house SET HouseGry = ".$Gry." WHERE HouseID = ".$GetID."" ;
   mysqli_query($conn , $sqlUpdate);
   $sqlUpdate2 = "UPDATE profilerated SET rated = 1 WHERE HouseID = ".$GetID." AND userProfileID = ". $id."" ;
   mysqli_query($conn , $sqlUpdate2);
   header("location: ../../rated.php?id=".$GetID."");
}
if (isset($_POST["submit-Raven"])) {
    $Raven = $Raven + 1;
    $sqlUpdate = "UPDATE house SET HouseRaven = ".$Raven." WHERE HouseID = ".$GetID."" ;
    mysqli_query($conn , $sqlUpdate);
    $sqlUpdate2 = "UPDATE profilerated SET rated = 1 WHERE HouseID = ".$GetID." AND userProfileID = ". $id."" ;
   mysqli_query($conn , $sqlUpdate2);
    header("location: ../../rated.php?id=".$GetID."");
}
if (isset($_POST["submit-Slyth"])) {
    $Slyth = $Slyth + 1;
    $sqlUpdate = "UPDATE house SET HouseSlyth = ".$Slyth." WHERE HouseID = ".$GetID."" ;
    mysqli_query($conn , $sqlUpdate);
    $sqlUpdate2 = "UPDATE profilerated SET rated = 1 WHERE HouseID = ".$GetID." AND userProfileID = ". $id."" ;
   mysqli_query($conn , $sqlUpdate2);
    header("location: ../../rated.php?id=".$GetID."");
}
if (isset($_POST["submit-Huff"])) {
    $Huff = $Huff + 1;
    $sqlUpdate = "UPDATE house SET HouseHuff = ".$Huff." WHERE HouseID = ".$GetID."" ;
    mysqli_query($conn , $sqlUpdate);
    $sqlUpdate2 = "UPDATE profilerated SET rated = 1 WHERE HouseID = ".$GetID." AND userProfileID = ". $id."" ;
   mysqli_query($conn , $sqlUpdate2);
    header("location: ../../rated.php?id=".$GetID."");
}
    }
?>