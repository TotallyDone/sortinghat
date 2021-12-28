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
<div class='center'>
<h1 >Home</h1>
    </div>
    

    <?php
    
if (isset($_SESSION["username"])) {


$id = $_SESSION['userProfileID'];

$sqlImg = "SELECT * FROM profileimg WHERE userProfileID = " . $id;
$resultimg = mysqli_query($conn , $sqlImg);
while ($row = mysqli_fetch_array($resultimg)){
    
    if($row['statusimg'] == 0){
        echo "<div class='center'><img class='profilepic-upload' src='assets/img/profiledefault.jpg' alt='profile pic'> </div>";
       
    }
    else{
        echo "<div class='center'><img class='profilepic' src='assets/img/profile".$id.".jpg' alt='profile pic'></div>";
    }
    
}
$sqlrated = "SELECT * FROM profilerated where userProfileID =" . $id." AND Rated = 0 LIMIT 1";

$resultrated = mysqli_query($conn , $sqlrated);
if ($row = mysqli_fetch_array($resultrated)){
    $House = $row['HouseID'];
   
    

echo " 

<br>
    <div class='center'>
    <button class='uploadredirect'>
    <a class='texty' style='
    text-decoration: none;
'href='rating.php?id=".$House."'>


    <p class='textbutton'>
    Put people in houses
    </p>
    </a>
    </button> </div><br>

<br>";



}

// bug to fix 
else {
    echo "<div class='center'><p> No profiles left to rate :(</p></div>";
}

}
else{
    echo"
    <div class='center'>
    <img class='hat-img' src='assets/img/sortinghat.jpg' alt=''>
    </div>
    <div class='center'>
        <section>
            <article>
                <h2>
                Are you Gryffindor? Are you Hufflepuff? Are you Slytherin? Are you Ravenclaw?
                </H2>
            </article>
            
            <article>
                <p> 
                Now, we’re assuming you’re more than familiar with the four houses of Hogwarts, but here’s a quick refresher, just in case.
                </p>
            </article>

            <article>
                <p> 
                Hogwarts was founded over a thousand years ago by four powerful wizards: Godric Gryffindor, Salazar Slytherin, Rowena Ravenclaw and Helga Hufflepuff. They chose to split the students into four ‘houses’, each bearing their surnames and featuring young wizards and witches who displayed abilities and personalities they wanted to nurture.
                </p>
            </article>
            <article>
                <p> 
                To do this, Godric Gryffindor used his magical hat – henceforward known as the Sorting Hat – to decide which children should go into which house, and so it has been ever since with a yearly Sorting Ceremony that places each new pupil into their own new home.
                </p>
            </article>
            <article>
                <p> 
                The four houses have different entry requirements, and nobody summed them up better than the old Sorting Hat itself in its welcoming song...
                </p>
            </article>

             <article>
                <h2>
                    Gryffindor
                </H2>
             
                <p>
                    Notable members include (of course) Harry Potter, Hermione Granger and Ron Weasley.
                </p>
            <br>
            <p>You might belong in Gryffindor,</p>
            <p>Where dwell the brave at heart,</p>
            <p>Their daring, nerve and chivalry</p>
            <p>Set Gryffindors apart.</p>
                
            </article>

            <article>
            <h2>
            Hufflepuff
                </H2>
             
                <p>
                Notable members include Newt Scamander, Cedric Diggory and Nymphadora Tonks.
                </p>
            <br>
            <p>‘You might belong in Hufflepuff</p>
            <p>Where they are just and loyal</p>
            <p>Those patient Hufflepuffs are true</p>
            <p>And unafraid of toil.’</p>
            </article>

            <article>
            <h2>
            Ravenclaw
                </H2>
             
                <p>
                Notable members include Luna Lovegood, Gilderoy Lockhart and Filius Flitwick.
                </p>
            <br>
            <p>‘Or yet in wise old Ravenclaw</p>
            <p>If you’ve a ready mind</p>
            <p>Where those of wit and learning</p>
            <p>Will always find their kind.’</p>
            </article>

            <article>
            <h2>
            Slytherin
                </H2>
             
                <p>
                Notable members include Severus Snape, Draco Malfoy and (rather unfortunately) Lord Voldemort.
                </p>
            <br>
            <p>‘Or perhaps in Slytherin</p>
            <p>You’ll make your real friends</p>
            <p>Those cunning folk use any means</p>
            <p>To achieve their ends.’</p>
            </article>
        </section> 
    </div>
    
    ";
}


?>

   
   

   
</body>
</html>