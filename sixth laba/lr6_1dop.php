<?php
session_start();
$textValue = $_SESSION["text"];
echo "Текст из сессии: " . $_SESSION["text"];
echo "<br>";
?>
<br>

    <form action="lr6_1.php" method="post">
        <input type="submit" value="Вернуться">
    </form>
