<?php

$host = "127.0.0.1";
$dbname = "pierrdoon";
$username = "pierrdoon";
$password = "0451";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM race";

$stmt = $pdo->prepare($query);
$stmt->execute();
$races = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Главная страница гоночной серии</title>
<link rel="stylesheet" href="./styles/style.css">
</head>
<body>

    <header>
        <div class="mainHeader">
        <div class="meow" style="height: 5px;"></div>
        <div class="headBtn">
            <a href="./index.php"><img src="./photo/logo.jpg" style="height: 80px; width: 80px; box-shadow: 0px 0px 10px 5px #000; margin: 15%;"></a>
            <a href="./index.php" style="text-decoration: none; margin: 3%; color: #000000;">Главная страница</a>
            <a href="./index.php" style="text-decoration: none; margin: 3%; color: #000000;">Новости</a>
        </div>
    </div>
    </header>

    <div class="main">
        <div class="authForm" style="margin-bottom: 2%;">
            <a href="./authPage.php" class="authButton" style="text-decoration: none;"><p>Вход</p></a>
        </div>
    <div class="authForm" style="width: 90vw;">
        <h1>Все будущие соревнования: </h1>
    </div>

    <div id="news">

            <?php foreach ($races as $race): ?>
                <div class="news-block2">
                    <h1>Гонка: <?php echo $race["race_name"]; ?></h1>
                    <h2>Дата проведения : <?php echo $race["race_date"]; ?></h2>
                </div>
            <?php endforeach; ?>
    </div>


</div>



</div>
</body>
</html>
