<?php 
session_start();


include_once "assets/includes/connect.inc.php";

include_once "assets/includes/head.inc.php";
?>



    <title>Document</title>
</head>
<body>
<?php
    include_once "nav.php";
    ?>
<div class='center'>
<h1 >rating</h1>
    </div>
    <?php 
     $getID = $_GET["id"];
    $id = $_SESSION['userProfileID'];
    $nextID = $getID + 1;


    




    

$sqlMaxID = "SELECT * FROM userprofile WHERE userProfileID = (SELECT MAX(userProfileID) FROM userprofile)";
$resultMax = mysqli_query($conn , $sqlMaxID);
while ($rowMax = mysqli_fetch_array($resultMax)){
    $MaxID = $rowMax['userProfileID'];




$sql = "SELECT * FROM userprofile WHERE userProfileID = " . $getID;
$result = mysqli_query($conn , $sql);
while ($row = mysqli_fetch_array($result)){
    $id = $row['userProfileID'];
     $name = $row['fullName'];
    $age = $row['leeftijd'];
    $gender = $row['gender'];
    $descript = $row['descript'];
    

// profile pic
$sqlImg = "SELECT * FROM profileimg WHERE userProfileID = " . $getID;
$resultimg = mysqli_query($conn , $sqlImg);
while ($row = mysqli_fetch_array($resultimg)){
    if($row['statusimg'] == 0){
        echo "<div class='center'><img class='profilepic' src='assets/img/profiledefault.jpg' alt='profile pic'> </div>";
    }else{
        echo "<div class='center'><img class='profilepic' src='assets/img/profile".$id.".jpg' alt='profile pic". $id ."'></div>";
    }
    echo"<br><div class='centerborder'><p>name: ". $name."</p>";
echo"<p>age: ". $age."</p>";
echo"<p>gender: ". $gender."</p>";
echo"<p>description: ". $descript."</p></div> <br>";
echo"
<br>
<div class='center-houses'>
<div class='container-houses'>
<form action='assets/includes/updaterating.php?id=".$getID."'   method='post'>



    <div class='row'>
    <div class='column'>
        <button class='button1'name='submit-Gry' type='submit'>
        <img src='assets/img/gryffindor-crest.png' alt=''>
        
        </button>
    </div>

    <div class='column'>
    <button class='button2'name='submit-Raven' type='submit'>
    <img src='assets/img/ravenclaw-crest.png' alt=''>
    </button>
    </div>
    </div>

    <div class='row'>
    <div class='column'>
    <button class='button3'name='submit-Slyth' type='submit'>
    <img src='assets/img/slytherin-crest.png' alt=''>
    </button>
    </div>
    

    <div class='column'>
    <button class='button4'name='submit-Huff' type='submit'>
    <img src='assets/img/hufflepuff-crest.png' alt=''>
    </button>
    </div>
    </div>


</form>
</div>
</div>

";

}


}

}
?>


</body>
</html>