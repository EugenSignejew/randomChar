<?php
echo "woop.php<br><br>";
//w o o p . p h p
//o o
//o   o
//p     p
//.       .
//p         p
//h           h
//p             p

$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");

$sql="SELECT * FROM `woop.php` ORDER BY rand();";
foreach($pdo->query($sql) as $row){
    echo "gotta get woop.php<br>".$row["id"]." ".$row["woop1.php"].", ".$row["woop2.php"].", ".$row["woop3.php"]."<br><br> ";
}