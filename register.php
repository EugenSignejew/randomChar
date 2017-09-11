<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if (isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<p class="registerMessage">please enter a working email</p><br>';
        $error = true;
    }
    if (strlen($password) == 0) {
        echo '<p class="registerMessage">please enter a password</p><br>';
        $error = true;
    }
    if ($password != $password2) {
        echo '<p class="registerMessage">Passwords must be the same</p><br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if (!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(['email' => $email]);
        $user = $statement->fetch();

        if ($user !== false) {
            echo '<p class="registerMessage">this email is already used</p><br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren oh yes
    if (!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $result = $statement->execute(['email' => $email, 'password' => $password_hash]);

        if ($result) {
            echo '<p class="registerMessage">Success</p>';
            $showFormular = false;
        } else {
            echo '<p class="registerMessage">Error</p><br>';
        }
    }
}
//apples
if ($showFormular) {
    ?>

    <div id="register" class="overlay">
        <a href="#" class="closebtn" id="hideRegister">&times;</a>
        <div class="overlay-content">
            <form action="?register=1" method="post">
                <input type="text" name="email" placeholder="email" maxlength="250" required><br>
                <input type="password" name="password" placeholder="Password" maxlength="250" required/><br>
                <input type="password" name="password2" placeholder="Confirm your password" maxlength="250" required/><br>
                <button id="registerButton2">Register</button>
            </form>
        </div>
    </div>
    <?php
} //Ende von if($showFormular) ende von apples and apples and apples
?>

</body>
</html>