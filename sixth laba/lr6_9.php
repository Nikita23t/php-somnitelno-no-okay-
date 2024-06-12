<?php
if (isset($_COOKIE["test"])) {
    $visits = $_COOKIE["test"] + 1;
} else {
    $visits = 1;
}

setcookie("test", $visits, time() + 86400 * 30);

if (isset($_POST["reset"])) {
    setcookie("test", "", time() - 3600);
    $visits = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница счетчика посещений</title>
</head>
<body>
    <h1>Вы посетили наш сайт <?php echo $visits; ?> раз!</h1>
    <form method="post">
        <button type="submit" name="reset">Обнулить счетчик</button>
    </form>
</body>
</html>
