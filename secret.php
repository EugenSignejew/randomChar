<?php
session_start();
if (!isset($_SESSION['userid'])) {
    die('please log in <a href="login.php"></a>');
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

echo "whats up nigg: " . $userid;