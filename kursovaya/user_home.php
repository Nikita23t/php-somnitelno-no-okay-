<?php
session_start();

$host = "127.0.0.1";
$dbname = "pierrdoon";
$username = "pierrdoon";
$password = "0451";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$name = $_SESSION["username"];

$query =
    "SELECT * FROM race_request JOIN race ON race_request.race = race.race_name WHERE race_request.name_racer = :name";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":name", $name);
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
            <a href="./indexUser.php"><img src="./photo/logo.jpg" style="height: 80px; width: 80px; box-shadow: 0px 0px 10px 5px #000; margin: 15%;"></a>
            <a href="./calendarUser.php" style="text-decoration: none; margin: 3%; color: #000000;">Соревнования</a>
            <a href="./indexUser.php" style="text-decoration: none; margin: 3%; color: #000000;">Новости</a>
            <a href="./index.php" style="text-decoration: none; margin: 3%; color: #000000;">Выход</a>
            <p style="text-decoration: none; margin: 3%; color: #000000;">Здравствуйте <strong><?php echo htmlspecialchars(
                $name
            ); ?></strong></p>
        </div>
    </div>
    </header>

    <div class="main">
    <div class="authForm" style="width: 90vw;">
        <h1>Ваши записи на соревнования: </h1>
    </div>


    <div id="news2">

            <?php foreach ($races as $race): ?>
                <div class="news-block2">
                    <h1>Гонка: <?php echo $race["race"]; ?></h1>
                    <h2>Дата проведения : <?php echo $race["race_date"]; ?></h2>
                </div>
            <?php endforeach; ?>
    </div>


</div>



</div>
</body>
</html>
