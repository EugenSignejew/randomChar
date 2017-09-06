<?php

echo '
<!doctype html>
<html>
<head>
<title>Start</title>
    <link rel="stylesheet" type="text/css" href="eve.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous">
    </script>
    <script src="apple.js"></script>
</head>
<body>
';

require("login.php");

echo '<button  id="loginButton" name="loginButton" ><span>Login</span></button>';

require("register.php");

echo '
<button id="registerButton"><span>Register</span></button>
<a href="logout.php"><button id="logoutButton"><span>Logout</span></button></a>

<p>Create your character</p>
<form method="post" action="adam.php">
    <select name="starter" required>
        <option value="">Choose a job</option>
        <option value="Warrior">Warrior(higher str)</option>
        <option value="Thief">Thief(higher dex)</option>
        <option value="Sorcerer">Sorcerer(higher int)</option>
        <option value="Useless">Useless(average)</option>
    </select>
    <select name="gender" required>
        <option value="">Choose your gender</option>
        <option value="male">M</option>
        <option value="female">F</option>
    </select>
    <input name="name" placeholder="Name" maxlength="40">(leave blank for a random name)<br>
    <button>Submit</button>
    <button type="reset" id="reset">Reset</button>
</form>

<img id="sword" src="img/black-sword.svg.hi.png">
<img id="sword2" src="img/black-sword.svg.hi.png">


</body>
<footer>&copy;Eugen 2017-' . date("d/m/Y") . '</footer>
</html>
';



