<?php 
include_once "assets/includes/head.inc.php";
include_once "assets/includes/connect.inc.php";
?>

    <title>Login</title>
</head>
<body>
<?php
    include_once "nav.php";
    ?>
    <h1>Login</h1>


<div class="center">
    <form action="assets/includes/login.inc.php" method="post">
    <label class="label">Username or Email</label><br>
    <input type="text" name="uid" placeholder="voorbeeld@mail.com"><br>
    <label class="label">password</label><br>
    <input type="password" name="pwd"><br><br>
    
    <button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Login</button>
    </form>
    </div>
    <div class="center">
    <p>don't have an account yet?</p>
    </div>


    <div class="center">
    <br>
    <div class='center'>
    <button class='uploadredirect'>
    <a class='texty' style='text-decoration: none;' href='register.php?error=empty'>


    <p class='textbutton'>
    register
    </p>
    </a>
    </button> </div><br>

<br>


    </div>
</body>
</html>