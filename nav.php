<?php


include_once "assets/includes/connect.inc.php";
include_once "assets/includes/head.inc.php";
if (isset($_SESSION["username"])) {



    $id = $_SESSION['userProfileID'];


    echo "

    <nav>  
  <ul class='container-nav'>  
    <li class='nav-item'>
        <a class='nav-link' href='index.php'>
            home
        </a>
    </li>  ";
    
   
      
   echo "<li class='nav-item'>
        <a class='nav-link' href='assets/includes/logout.inc.php'>
            Logout
        </a>
    </li>";  
    echo "<li class='nav-item'>
        <a class='nav-link' href='myProfile.php'>";
            
        $sqlImg = "SELECT * FROM profileimg WHERE userProfileID = " . $id;
$resultimg = mysqli_query($conn , $sqlImg);
while ($row = mysqli_fetch_array($resultimg)){
    
    if($row['statusimg'] == 0){
        echo "<img class='profilepic-nav' src='assets/img/profiledefault.jpg' alt='profile pic'> ";
       
    }
    else{
        echo "<img class='profilepic-nav' src='assets/img/profile".$id.".jpg' alt='profile pic'>";
    }
    
}
        
     echo"  
        </a>
    </li>  
  </ul>  
</nav>





    
    
    ";
    
}
else{
    echo "
    

    <nav>  
  <ul class='container-nav'>  
    <li class='nav-item'>
        <a class='nav-link' href='index.php'>
            home
        </a>
    </li>  
    <li class='nav-item'>
    <a class='nav-link'href='login.php'>
    Login
    </a>
    </li>  
      
    <li class='nav-item'>
        <a class='nav-link' href='register.php?error=empty'>
        Register
        </a>
    </li>  
  </ul>  
</nav>





    
    
    




    
    
    
    ";
}