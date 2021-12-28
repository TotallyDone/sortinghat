<?php 
include_once "assets/includes/head.inc.php";
include_once "assets/includes/connect.inc.php";
?>

    <title>Register</title>
</head>
<body>
<?php
    include_once "nav.php";
    ?>
    <h1>Register</h1>

<?php

$getID = $_GET["error"];

if($getID == "none"){
echo"<h2>your account has been created and you can login now</h2>";
}

?>


<div class="center">
    <form action="assets/includes/register.inc.php"   method="post">
    <label class="label">fullname</label><br>
    <input type="text" name="name" placeholder="Voornaam Achternaam" required><br>

    <label class="label">Email</label><br>
    <input class="input--style-4" type="email" name="email" placeholder="voorbeeld@mail.com" required><br>

    <label class="label">username</label><br>
    <input class="input--style-4" type="text" name="username" required><br>

    <label class="label">Age</label><br>
    <input class="input--style-4" type="number" min="0" max="99" name="leeftijd" required><br>

    <label class="label">Gender</label><br>
    <select  id="gender" name="gender" required>
                <option value="male"> male </option>
                <option value="female"> female</option>
    </select><br>

    <label class="label">description</label><br>
    
    <textarea class="descript" name="description" cols="40" rows="5"></textarea><br>

    <label class="label">password</label><br>
    <input class="input--style-4" type="password" name="pwd" required><br>

    <label class="label">repeat password</label><br>
    <input class="input--style-4" type="password" name="pwdrepeat" required><br><br>
    
<button class="btn btn--radius-2 btn--blue" name="submit" type="submit">Register</button>
</div>

    </form>
    <div class="center">
    <p>you already have an account?</p>
    </div>
    <div class="center">
    <button>
    <a href="login.php">
    Login
    </a>
    </button>
</div>
</body>
</html>