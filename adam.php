<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

echo '<!DOCTYPE html>
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

<body>';

$firstM = [
    "Bob",
    "Joe",
    "Kevin",
    "Mike",
    "Vega",
    "Larry",
    "Zane",
    "Shiny",
    "Wanda",
    "Chosen",
    "Cursed",
    "Malcolm",
    "Reese",
    "Gon",
    "Ging",
    "Killua",
    "Leorio",
];

$firstF = [
    "maya",
    "Kelly",
    "Lisa",
    "Shiny",
    "Wanda",
    "Ursula",
    "Ann",
    "Hermine",
    "Excella",
    "Mako",
    "Ryouku",
    "Chosen",
    "Cursed",
    "Akko",
    "Panty",
    "Stocking",
    "Biscuit",
    "Katsuki",
    "Sonic"
];

$last = [
    "Smith",
    "Johnsen",
    "Warmson",
    "Chariot",
    "Numb",
    "Kelly",
    "Nano",
    "Excelsia",
    "Johansen",
    "Lokoma",
    "Mankanchoku",
    "Undead",
    "Ani",
    "Anarchy",
    "Freeccs",
    "Zoldyck",
    "Paladiknight",
    "Kiryoin",
    "the Hedghehog"
];

$settings = [
    "in a dense Forest full of life",
    "in an isolated city",
    "on Mars ",
    "in a Hospital",
    "under a Bridge",
    "on the top of a skyscraper",
    "inside the planets core",
    "in a cave",
    "on an enemy ship",
    "in spaaaaaaaace",
    "in an almost abandoned shrine",
    "in your home",
    "in a comfy village"
];

$antagonists = [
    "Overlord Zenon, Lord of Lords",
    "The Devil himself",
    "Your brother turned against you",
    "A giant Monstrosity of Sin",
    "your inner greed",
    "God",
    "yourself",
    "your addiction",
    "The hero of the story",
    "King eruem",
    "Hisoka the Magician"
];

$objectives = [
    "have to find the scrungy plingus ",
    "have to defeat " . $antagonists[array_rand($antagonists)],
    "have to find your long lost Sibling ",
    "need to save your parents ",
    "will help all people in need ",
    "need to find yourself ",
    "want to take over the world ",
    "have to slay the dragon",
    "have to 'slay' the dragon",
    "have to save the world from yourself",
    "want to become a master of a craft",
    "have to find the first flame",
    "need to become a nen master",
    "find stronger and stronger foes",
    "defeat the forces of evil"
];

$complications = [
    "you only have one arm.",
    "you dont know where you are.",
    "you are blind.",
    "you dont have any friends.",
    "you are very poor.",
    "you lost your memory.",
    "you are cursed.",
    "you are undead",
    "you have social anxiety.",
    "you dont have any combat skills.",
    "you cant do anything right.",
    "you are a dragon",
    "you are a dragon maid"
];

//continue here I guess

/*
$firstM = ("SELECT * FROM firstm ORDER BY RAND() LIMIT 1");
$firstF = ("SELECT * FROM firstf ORDER BY RAND() LIMIT 1");
$last = ("SELECT * FROM lastname ORDER BY RAND() LIMIT 1");
$settings = ("SELECT * FROM settings ORDER BY RAND() LIMIT 1");
$antagonists = ("SELECT * FROM antagonists ORDER BY RAND() LIMIT 1");
$objectives = ("SELECT * FROM objectives ORDER BY RAND() LIMIT 1");
$complications = ("SELECT * FROM complications ORDER BY RAND() LIMIT 1");

*/

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
    echo $first[array_rand($first)] . ' ' . $last[array_rand($last)];
} else {
    echo $name;
}
echo ',<br>
<div id="diceRoller">';
echo "<p>Dice roller</p>";

function roll($sides) {
    return mt_rand(1, $sides);
}

echo "<span style='font-weight:bold'>4 sided Die: </span>" . roll(4) . "<br>" .
    "<span style='font-weight:bold'>6 sided Die: </span>" . roll(6) . "<br>" .
    "<span style='font-weight:bold'>20 sided Die: </span>" . roll(20) . "<br>" .
    "<span style='font-weight:bold'>100 sided Die: </span>" . roll(100) . "<br><br>";
echo '</div>
<button type=button id="showDice">show Dice</button><br>';

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

echo "<br> You are " . $settings[array_rand($settings)] . " and you " . $objectives[array_rand($objectives)] . " but " . $complications[array_rand($complications)];

echo '
</body>
<footer>&copy;Eugen 2017-' . date("Y") . '</footer>
</html>';