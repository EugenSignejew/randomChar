<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
    } else {
        $errorMessage = "wrong email or password<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
if (isset($errorMessage)) {
    echo $errorMessage;
}
?>

<div id="login" class="overlay">
    <a href="#" class="closebtn" id="hideLogin">&times;</a>

    <div class="overlay-content">
        <form action="?login=1" method="post">
            <input type="email" name="email" placeholder="email" maxlength="250"/><br>
            <input type="password" name="password" placeholder="Password" maxlength="250"/><br>
            <button id="loginButton2">Login</button>
        </form>
    </div>
</div>


</body>
</html>