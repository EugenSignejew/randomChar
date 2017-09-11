<?php
session_start();

if($_POST['csrf'] !== $_SESSION['csrf_token']) {
    die("Ungültiger Token");
}

session_destroy();
session_write_close();
header("location:start.php");
exit();

//great