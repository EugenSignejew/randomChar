<?php
echo "woop.php<br><br>";
//w o o p . p h p
//o
//o
//p
//.
//p
//h
//p

$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");

$sql="SELECT * FROM `woop.php`";
foreach($pdo->query($sql) as $row){
    echo $row["id"]." ".$row["woop1.php"].", ".$row["woop2.php"].", ".$row["woop3.php"]."<br><br>";
}