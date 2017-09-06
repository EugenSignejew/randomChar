<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

echo '<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="eve.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous">
    </script>
    <script src="apple.js"></script>
</head>

<body>';

$firstMDB = ("SELECT * FROM firstM ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($firstMDB) as $row) {
    $firstM = $row['firstM'];
}

$firstFDB = ("SELECT * FROM firstF ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($firstFDB) as $row) {
    $firstF = $row['firstF'];
}

$lastnameDB = ("SELECT * FROM lastname ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($lastnameDB) as $row) {
    $lastname = $row['lastname'];
}

$settingsDB = ("SELECT * FROM settings ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($settingsDB) as $row) {
    $settings = $row['settings'];
}

$antagonistsDB = ("SELECT * FROM antagonists ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($antagonistsDB) as $row) {
    $antagonists = $row['antagonists'];
}

$objectivesDB = ("SELECT * FROM objectives ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($objectivesDB) as $row) {
    $objectives = $row['objectives'];
}

$complicationsDB = ("SELECT * FROM complications ORDER BY RAND() LIMIT 1;");

foreach ($pdo->query($complicationsDB) as $row) {
    $complications = $row['complications'];
}

//continue here I guess

function roll2($sides) {
    return mt_rand(3, $sides);
}

function rollSpecial($sides) {
    return mt_rand(7, $sides);
}

$starter = $_POST['starter'];
$gender = $_POST['gender'];
$name = $_POST['name'];

$first = $firstM;

if ($gender == "female") {
    $first = $firstF;
}

echo 'You are a ' . $gender . " " . $starter . ' named ';
if (empty($name)) {
    echo $first . ' ' . $lastname;
} else {
    echo $name;
}
echo ',<br>
<div id="diceRoller">';
echo "<p>Dice roller</p>
<button class=\"roll\" id='d4'>D4</button>
<button class=\"roll\" id='d6'>D6</button>
<button class=\"roll\" id='d10'>D10</button>
<button class=\"roll\" id='d20'>D20</button>
<button class=\"roll\" id='d100'>D100</button>
<div class=\"die\">0</div>
</div>
<button type=button id='showDice'>show Dice</button><br>";

class job {
    public $name;
    public $str;
    public $dex;
    public $vit;
    public $int;
    public $image;

}

$warrior = new job;
$warrior->name = "Warrior";
$warrior->str = rollSpecial(15);
$warrior->dex = roll2(9);
$warrior->vit = roll2(12);
$warrior->int = roll2(6);
//$warrior->image = "<img src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/knight_small.jpg'>";

$thief = new job;
$thief->name = "Thief";
$thief->str = roll2(7);
$thief->dex = rollSpecial(15);
$thief->vit = roll2(10);
$thief->int = roll2(10);
//$thief->image = "<img src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/thief_small.jpg'>";

$sorcerer = new job;
$sorcerer->name = "Sorcerer";
$sorcerer->str = roll2(6);
$sorcerer->dex = roll2(12);
$sorcerer->vit = roll2(9);
$sorcerer->int = rollSpecial(15);
//$sorcerer->image = "<img src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/sorcerer_small.jpg'>";

$useless = new job;
$useless->name = "Useless";
$useless->str = roll2(12);
$useless->dex = roll2(12);
$useless->vit = roll2(12);
$useless->int = roll2(12);
//$useless->image = "<img src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/deprived_small.jpg'>";

switch ($starter) {
    case "Warrior":

        echo "Your stats are <br> Strength: " . $warrior->str . " Dexterity: " . $warrior->dex;
        echo "<br> Vitality: " . $warrior->vit . " Intelligence: " . $warrior->int;
        echo "<br>" . $warrior->image;

        break;
    case "Thief":

        echo "Your stats are <br> Strength: " . $thief->str . " Dexterity: " . $thief->dex;
        echo "<br> Vitality: " . $thief->vit . " Intelligence: " . $thief->int;
        echo "<br>" . $thief->image;

        break;
    case "Sorcerer":

        echo "Your stats are <br> Strength: " . $sorcerer->str . " Dexterity: " . $sorcerer->dex;
        echo "<br> Vitality: " . $sorcerer->vit . " Intelligence: " . $sorcerer->int;
        echo "<br>" . $sorcerer->image;

        break;
    case "Useless";

        echo "Your stats are <br> Strength: " . $useless->str . " Dexterity: " . $useless->dex;
        echo "<br> Vitality: " . $useless->vit . " Intelligence: " . $useless->int;
        echo "<br>" . $useless->image;

        break;
}

if (($objectives == "have to defeat") OR ($objectives == "have to save the world from")) {
    $objectives = $objectives . " " . $antagonists;
}

echo "<br>" . $settings . " and you " . $objectives . " but " . $complications;

echo '
</body>
<footer>&copy;Eugen 2017-' . date("d/m/Y") . '</footer>
</html>';