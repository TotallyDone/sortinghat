<?php
session_start();
if (isset($_POST["submit"])) {
    //code...
    
        //Get the contents of the image

$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$pwd = $_POST["pwd"];
$pwdrepeat = $_POST["pwdrepeat"];
$age = $_POST["leeftijd"];
$gender = $_POST["gender"];
$description = $_POST["description"];
// $img = $_POST["userImage"];






require_once 'connect.inc.php';
require_once 'functions.inc.php';
$last_id = mysqli_insert_id($conn);



if(emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat, $age, $gender, $description) !== false){
    header("location: ../../register.php?error=emptyinput");
    exit();
}
if(invalidUid($username) !== false){
    header("location: ../../register.php?error=invaliduid");
    exit();
}
if(invalidEmail($email) !== false){
    header("location: ../../register.php?error=invalidemail");
    exit();
}

if(pwdMatch($pwd, $pwdrepeat) !== false){
    header("location: ../../register.php?error=passwordsdontmatch");
    exit();
}
if(uidExists($conn, $username,  $email) !== false){
    header("location: ../../register.php?error=usernametaken");
    exit();
 }
 

 createUser($conn, $name, $email, $username, $pwd, $pwdrepeat, $age, $gender, $description, $last_id);
 
}

else{
    header("location: ../../register.php?error=none");
    exit();
}


