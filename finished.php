<?php 
session_start();
include_once "assets/includes/connect.inc.php";
include_once "assets/includes/head.inc.php";


?>

    <title>Home</title>
    
</head>
<body>
<?php
    include_once "nav.php";
    ?>
    <?php
    $id = $_SESSION['userProfileID'];
$sql = "SELECT fullName FROM userprofile WHERE userProfileID = " . $id;
$result = mysqli_query($conn , $sql);
while ($row = mysqli_fetch_array($result)){
    
     $name = $row['fullName'];
     echo "<h1>Thats is it,".$name.".
     You rated them all!
     </h1>";}
    ?>
    
    
</body>
</html>