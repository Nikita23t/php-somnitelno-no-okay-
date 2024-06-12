<?php
session_start();

if (!isset($_SESSION["page_refresh_count"])) {
    $_SESSION["page_refresh_count"] = 0;
    $message = "Вы еще не обновляли страницу.";
} else {
    $_SESSION["page_refresh_count"]++;
    $message = "Количество обновлений страницы: {$_SESSION["page_refresh_count"]}";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счетчик обновлений страницы</title>
</head>
<body>
    <h1>Счетчик обновлений страницы</h1>
    <p><?php echo $message; ?></p>
</body>
</html>
