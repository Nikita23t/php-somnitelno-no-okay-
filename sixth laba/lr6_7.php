<?php
$text = "Произвольный текст";
setcookie("test", $text, time() + 3600);

if (isset($_COOKIE["test"])) {
    echo $_COOKIE["test"];
}
?>
