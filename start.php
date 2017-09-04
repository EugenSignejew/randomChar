<!doctype html>
<html>
    <head>
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
        <p>Create your character</p>
            <form method="post" action="adam.php">
                <select name='starter' required>
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
                <input type="Submit" value="Submit"/>
                <button type="reset">Reset</button>
            </form>
    </body>
    <footer>&copy;Eugen 2017-<?php echo date("Y"); ?></footer>
</html>



