<?php
session_start();

if (isset($_POST["text"])) {
    $_SESSION["text"] = $_POST["text"];
}
if (isset($_SESSION["text"])) {
    echo "Текст из сессии: " . $_SESSION["text"];
}
?>
<form method="post">
    <input type="text" name="text" placeholder="Введите текст">
    <input type="submit" value="Сохранить">
</form>
<br>
<br>
    <form action="lr6_1dop.php" method="post">
        <input type="submit" value="Вперед на следующую страницу">
    </form>
