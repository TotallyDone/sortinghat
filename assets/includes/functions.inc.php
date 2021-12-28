<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat, $age, $gender, $description)
{
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat) || empty($age) || empty($gender) || empty($description) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdrepeat)
{
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email)
{
    $result = true;
    $sql = "SELECT * FROM userprofile WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
    exit();
}
function last_id($conn) {
    $GLOBALS['last_id'] = mysqli_insert_id($conn);
  }
  
  function profileRated1($conn)
{
$count = 0;

$sqlCounter = "SELECT * FROM profilerated WHERE ProfileRatedID = (SELECT MAX(ProfileRatedID) FROM profilerated)";
$resultCounter = mysqli_query($conn , $sqlCounter);
while ($row = mysqli_fetch_array($resultCounter)){
    $counter = $row['ProfileRatedID'];
    $counter = $counter + 1 ;

    $sqlMaxID = "SELECT * FROM userprofile WHERE userProfileID = (SELECT MAX(userProfileID) FROM userprofile)";
$resultMax = mysqli_query($conn , $sqlMaxID);
while ($rowMax = mysqli_fetch_array($resultMax)){

    $MaxID = $rowMax['userProfileID'];
    
    for($y = 1; $y <= $MaxID; $y++){
        if($y == $MaxID){
            $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
            VALUES (".$counter.", ".$y.", ".$MaxID.", 1);";
            mysqli_query($conn , $sqlinsert);
            $counter++;
            
        }
        else{
            $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
            VALUES (".$counter.", ".$y.", ".$MaxID.", ".$count.");";
            mysqli_query($conn , $sqlinsert);
            $counter++;
            
        }
        
    
    }
    for($i = 1; $i < $MaxID; $i++){
        if($i == $MaxID){
            $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
            VALUES (".$counter.", ".$MaxID.", ".$i.", ".$count.");";
            mysqli_query($conn , $sqlinsert);
            $counter++;
           
        }
        else{
            $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
            VALUES (".$counter.", ".$MaxID.", ".$i.", ".$count.");";
            mysqli_query($conn , $sqlinsert);
            $counter++;
            
        }
        
    
    }
    
}

}

}
function createUser($conn, $name, $email, $username, $pwd, $pwdrepeat, $age, $gender, $description, $last_id)
{
    $sql = "INSERT INTO userprofile (fullName, email , username, hashedpassword, Leeftijd, gender, descript, houseID) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../../register.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    // insert data in house table 
    $sql = "INSERT INTO house (HouseGry, HouseRaven, HouseSlyth, HouseHuff) VALUES (0, 0, 0, 0)";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $last_id = mysqli_insert_id($conn);

    



// insert data in user table
    $sql = "INSERT INTO userprofile (fullName, email , username, hashedpassword, Leeftijd, gender, descript, houseID) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssdssd", $name, $email, $username, $hashedPwd, $age, $gender, $description, $last_id);
    mysqli_stmt_execute($stmt);



    $last_id = mysqli_insert_id($conn);

    $sql = "INSERT INTO profileimg (userProfileID, statusimg) VALUES ($last_id, 0)";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


$sqlempty ="SELECT * FROM profilerated";
$resultempty = mysqli_query($conn , $sqlempty);
    if($rowempty = mysqli_fetch_array($resultempty)){
        profileRated1($conn);
        header("location: ../../register.php?error=none");
    exit();
    }
    else{
        $sqlMaxID = "SELECT * FROM userprofile WHERE userProfileID = (SELECT MAX(userProfileID) FROM userprofile)";
        $resultMax = mysqli_query($conn , $sqlMaxID);
        while ($rowMax = mysqli_fetch_array($resultMax)){
            $MaxID = $rowMax['userProfileID'];
        profileRated($conn, $MaxID, $MaxID);
       
    }
    header("location: ../../register.php?error=none");
    exit();  
    }

    header("location: ../../register.php?error=none");
    exit();
    
}






function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


 function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["hashedpassword"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userProfileID"] = $uidExists["userProfileID"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../../index.php?login_succes");
    }
} 




function profileRated($conn, $maxHouseID, $maxUserID)
{
$count = 0;
$counter = 1;
    for($i = 1; $i <= $maxUserID; $i++){

        for($y = 1; $y <= $maxHouseID; $y++){
            if($i == $y){
                $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
                VALUES (".$counter.", ".$y.", ".$i.", 1);";
                mysqli_query($conn , $sqlinsert);
                $counter++;
                
            }
            else{
                $sqlinsert = "INSERT INTO profilerated (ProfileRatedID, HouseID, userProfileID, Rated)
                VALUES (".$counter.", ".$y.", ".$i.", ".$count.");";
                mysqli_query($conn , $sqlinsert);
                $counter++;
               
            }
            
        
        }


    }

    



}

