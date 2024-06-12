<?php
if (isset($_COOKIE["test"])) {
    setcookie("test", "", time() - 3600);
    echo "Cookie 'test' удалена.";
} else {
    echo "Cookie 'test' не найдена.";
}
?>
