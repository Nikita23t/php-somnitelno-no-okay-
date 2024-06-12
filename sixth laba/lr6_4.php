<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["country"] = $_POST["country"];
    header("Location: lr6_4dop.php");
    exit();
}
?>

<form method="POST" action="">
    <input type="text" name="country" placeholder="Введите страну">
    <input type="submit" value="Сохранить">
</form>
