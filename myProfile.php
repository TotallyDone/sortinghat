<?php 
session_start();
include_once "assets/includes/connect.inc.php";
include_once "assets/includes/head.inc.php";


?>

    <title>My profile</title>
    
</head>
<body>
<?php
    include_once "nav.php";
    ?>
    <div class='center'>
<h1 >Your Profile</h1>
    </div>
    
    <?php
     $id = $_SESSION['userProfileID'];
    $sql = "SELECT * FROM userprofile WHERE userProfileID = " . $id;
    $result = mysqli_query($conn , $sql);
    while ($row = mysqli_fetch_array($result)){
        $id = $row['userProfileID'];
         $name = $row['fullName'];
        $age = $row['leeftijd'];
        $gender = $row['gender'];
        $descript = $row['descript'];
        $HouseID = $row['HouseID'];
    
    // profile pic
    $sqlImg = "SELECT * FROM profileimg WHERE userProfileID = " . $id;
    $resultimg = mysqli_query($conn , $sqlImg);
    while ($row = mysqli_fetch_array($resultimg)){
        

        if($row['statusimg'] == 0){
            echo "<div class='center'><img class='profilepic-upload' src='assets/img/profiledefault.jpg' alt='profile pic'> </div>";
            echo " <br>
    <div class='center'>
    <button class='uploadredirect'>
    <a class='texty' style='
    text-decoration: none;
'href='uploadimg.php'>


    <p class='textbutton'>
    upload profile picture
    </p>
    </a>
    </button> </div><br>";
           /* echo"<form action='assets/includes/upload.php' enctype='multipart/form-data' method='post'>
            <input type='file' name='userImage' accept='image/png, image/jpeg' required><br><br>
            <button  name='submit' type='submit'>upload profilepic</button>
            </form>*/
        }else{
            echo "<div class='center'><img class='profilepic' src='assets/img/profile".$id.".jpg' alt='profile pic". $id ."'></div>";
        }
        echo"<div class='centerborder'><p>name: ". $name."</p>";
        echo"<p>age: ". $age."</p>";
        echo"<p>gender: ". $gender."</p>";
        echo"<p>description: ". $descript."</p></div> <br>";


        $sqlHouse = "SELECT * FROM house WHERE HouseID = " . $HouseID;
        $resultHouse = mysqli_query($conn , $sqlHouse);
        while ($row = mysqli_fetch_array($resultHouse)){
            $Gry = $row['HouseGry'];
            $Raven = $row['HouseRaven'];
            $Slyth = $row['HouseSlyth'];
            $Huff = $row['HouseHuff'];
    
            $total = $Huff + $Slyth + $Raven + $Gry;
            
            
            if($total > 0){
                $GryPercentage = $Gry / $total * 100;
                $RavenPercentage = $Raven / $total * 100;
                $SlythPercentage = $Slyth / $total * 100;
                $HuffPercentage = $Huff / $total * 100;
    
                echo"


            
<br>
<div class='center'>
<div class='container'>




    <div class='row'>
    <div class='column'>
        <button class='button1'>
        <img src='assets/img/gryffindor-crest.png' alt=''>
        <p class='percent'>".$GryPercentage."%</p>
        </button>
    </div>

    <div class='column'>
    <button class='button2'>
    <img src='assets/img/ravenclaw-crest.png' alt=''>
    <p class='percent'>".$RavenPercentage."%</p>
    </button>
    </div>
    </div>

    <div class='row'>
    <div class='column'>
    <button class='button3'>
    <img src='assets/img/slytherin-crest.png' alt=''>
    <p class='percent'>".$SlythPercentage."%</p>
    </button>
    </div>
    

    <div class='column'>
    <button class='button4'>
    <img src='assets/img/hufflepuff-crest.png' alt=''>
    <p class='percent'>".$HuffPercentage."%</p>
    </button>
    </div>
    </div>



</div>
</div>";
            }
            else{
                echo"
                <br>
<div class='center'>
<div class='container'>




    <div class='row'>
    <div class='column'>
        <button class='button1'>
        <img src='assets/img/gryffindor-crest.png' alt=''>
        
        </button>
    </div>

    <div class='column'>
    <button class='button2'>
    <img src='assets/img/ravenclaw-crest.png' alt=''>
    
    </button>
    </div>
    </div>

    <div class='row'>
    <div class='column'>
    <button class='button3'>
    <img src='assets/img/slytherin-crest.png' alt=''>
    
    </button>
    </div>
    

    <div class='column'>
    <button class='button4'>
    <img src='assets/img/hufflepuff-crest.png' alt=''>
    
    </button>
    </div>
    </div>



</div>
</div>";
            }
            
            }
    
    }
    
    
    }
    ?>
    
</body>
</html>