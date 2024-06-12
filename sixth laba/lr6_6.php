<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["email"] = $_POST["email"];
    header("Location: lr6_6dop.php");
    exit();
}
?>

<form method="POST" action="">
    <input type="email" name="email" placeholder="Введите email">
    <input type="submit" value="Сохранить">
</form>
