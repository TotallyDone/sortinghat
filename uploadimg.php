
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
    
    echo"<div class='center'><form action='assets/includes/upload.php' enctype='multipart/form-data' method='post'>
    <input type='file' name='userImage' accept='image/png, image/jpeg' required><br><br>
    <button  name='submit' type='submit'>upload profilepic</button>
    </form></div>";
    ?>
    
</body>
</html>