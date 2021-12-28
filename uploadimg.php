
<?php 
session_start();
include_once "assets/includes/connect.inc.php";
include_once "assets/includes/head.inc.php";


?>

    <title>uploadimg</title>
    
</head>
<body>
    <?php
    include_once "nav.php";
    ?>
<div class='center'>
<h1 >Upload img</h1>
    </div>

    <?php 
    $id = $_SESSION['userProfileID'];

    $sqlImg = "SELECT * FROM profileimg WHERE userProfileID = " . $id;
    $resultimg = mysqli_query($conn , $sqlImg);
    while ($row = mysqli_fetch_array($resultimg)){
        

        if($row['statusimg'] == 0){
            echo "<div class='center'><img class='profilepic-upload' src='assets/img/profiledefault.jpg' alt='profile pic'> </div>";
            
            echo"<form action='assets/includes/upload.php' enctype='multipart/form-data' method='post'>
            <input type='file' name='userImage' accept='image/png, image/jpeg' required><br><br>
            <button  name='submit' type='submit'>upload profilepic</button>
            </form>";
        }else{
            echo "<div class='center'><img class='profilepic' src='assets/img/profile".$id.".jpg' alt='profile pic". $id ."'></div>";
        }
    }
    ?>
    
</body>
</html>