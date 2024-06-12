<?php
$host = "127.0.0.1";
$dbname = "pierrdoon";
$username = "pierrdoon";
$password = "0451";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Подключение не удалось: " . $e->getMessage());
}

$name = isset($_POST["username"]) ? $_POST["username"] : null;
$surname = isset($_POST["password"]) ? $_POST["password"] : null;
$query =
    "INSERT INTO users_login (login_id, password_user) VALUES (:name, :surname)";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":surname", $surname);
$stmt->execute();
header("Location: authPage.php");

?>
