<?php
session_start();

if (!$_SESSION['userid']) {
    header("Location: start.php");
    die();
}

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("DELETE FROM users WHERE id = ?");
$deleteThis = $pdo->lastInsertId();
$statement->execute([0]);

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

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

$starter = $_POST['starter'];
$gender = $_POST['gender'];
$name = $_POST['name'];

$first = $firstM;

if ($gender == "female") {
    $first = $firstF;
}

echo 'You are a ' . $gender . " <span id='spanJob'>" . $starter . '</span> named ';
if (empty($name)) {
    echo $first . ' ' . $lastname;
} else {
    echo '<span id="spanName">' . e($name) . "</span>";
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
<button type=button id='showDice'>show Dice</button><br>
<a href='start.php'><button id='goBack'>go back</button></a>

<div id='half'></div>
<div id='secret' class='overlay'>

    <a href='' class='closebtn' id='hideSecret'>&times;</a>
    <img id='skel' src='http://www.animatedimages.org/data/media/628/animated-skeleton-image-0014.gif'>
    <img id='spook' src='http://bestanimations.com/Humans/Skeletons/skeleton-animated-gif-20.gif'>
    <div class='overlay-content'>
    </div>
</div>

<button id='secretButton'>Secret</button>";

class job {
    public $name;
    public $str;
    public $dex;
    public $vit;
    public $int;
    public $image;

    function shout() {
        echo "I am a" . $this->name . "!";
    }

}

$warrior = new job;
$warrior->name = "Warrior";
$warrior->str = rollSpecial(15);
$warrior->dex = roll2(9);
$warrior->vit = roll2(12);
$warrior->int = roll2(6);
$warrior->image = "<img class='jobPic' src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/knight_small.jpg'>";

$thief = new job;
$thief->name = "Thief";
$thief->str = roll2(7);
$thief->dex = rollSpecial(15);
$thief->vit = roll2(10);
$thief->int = roll2(10);
$thief->image = "<img class='jobPic' src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/thief_small.jpg'>";

$sorcerer = new job;
$sorcerer->name = "Sorcerer";
$sorcerer->str = roll2(6);
$sorcerer->dex = roll2(12);
$sorcerer->vit = roll2(9);
$sorcerer->int = rollSpecial(15);
$sorcerer->image = "<img class='jobPic' src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/sorcerer_small.jpg'>";

$useless = new job;
$useless->name = "Useless";
$useless->str = roll2(12);
$useless->dex = roll2(12);
$useless->vit = roll2(12);
$useless->int = roll2(12);
$useless->image = "<img class='jobPic' src='http://darksouls3.wiki.fextralife.com/file/Dark-Souls-3/deprived_small.jpg'>";

$job = "$" . $starter;

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
//great days and even more days