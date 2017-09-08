<?php

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM users ORDER BY email";
foreach ($pdo->query($sql) as $row) {
    echo $row["email"] . "<br>";
}

$statement = $pdo->prepare("DELETE FROM users WHERE id = ?");
$statement->execute([10]);

echo "<br><br>";

class MyClass {
    public $prop1 = "I'm a class property!";

    public static $count = 0;

    public function __construct() {
        echo 'The class "', __CLASS__, '" was initiated!<br />';
    }

    public function __destruct() {
        echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

    public function __toString() {
        echo "Using the toString method: ";

        return $this->getProperty();
    }

    public function setProperty($newval) {
        $this->prop1 = $newval;
    }

    private function getProperty() {
        return $this->prop1 . "<br />";
    }

    public static function plusOne() {
        return "The count is " . ++self::$count . ".<br />";
    }
}

class MyOtherClass extends MyClass {
    public function __construct() {
        parent::__construct();
        echo "A new constructor in " . __CLASS__ . ".<br />
verbinde mich mit der datenbank ";
    }

    public function newMethod() {
        echo "From a new method in " . __CLASS__ . ".<br />";
    }

}

echo "<form method='post' action=''><button>count up to</button><input type='text' name='number'>
</form><br>";

if (empty($_POST["number"])) {
    $number = 1;
} else {
    $number = $_POST["number"];
}

do {
    // Call plusOne without instantiating MyClass
    echo MyClass::plusOne();
} while (MyClass::$count < $number);
//guad ausschaut man