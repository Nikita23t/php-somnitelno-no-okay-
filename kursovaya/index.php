<?php
$host = "localhost";
$dbname = "pierrdoon";
$user = "pierrdoon";
$password = "0451";
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
$query = "SELECT  *  FROM news";
$stmt = $pdo->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Главная страница гоночной серии</title>
<link rel="stylesheet" href="/styles/style.css">
</head>
<body>

    <header>
        <div class="mainHeader">
        <div class="meow" style="height: 5px;"></div>
        <div class="headBtn">
            <a href="./index.php"><img src="./photo/logo.jpg" style="height: 80px; width: 80px; box-shadow: 0px 0px 10px 5px #000; margin: 15%;"></a>
            <a href="./calendar.php" style="text-decoration: none; margin: 3%; color: #000000;">Соревнования</a>
            <a href="#slider-container" style="text-decoration: none; margin: 3%; color: #000000;">Новости</a>
        </div>
    </div>
    </header>

    <div class="main">
    <div class="authForm">
        <a href="./authPage.php" class="authButton" style="text-decoration: none;"><p>Вход</p></a>
    </div>

    <div id="slider-container">
    <div id="slider-wrapper">
        <div class="slide" style="background-image: url(https://golightstream.com/wp-content/uploads/2022/02/Twitch-Banner-Size-1.jpg); background-position-x: 10%; background-position-y: 50%; color: white;"><h1 style="margin-top: 10%; margin-right: 40%; font-size: 50px;">Смотрите наши трансляции<br> по гонкам на Twitch</h1></div>
        <div class="slide" style="background-image: url(./photo/4.jpg); background-position: 50%; color: white;"><h1 style="margin-top: 28%; font-size: 50px;">Аркадий Цареградцев загорелся</h1></div>
        <div class="slide" style="background-image: url(./photo/6.jpg); background-position-x: 55%; background-position-y: 85%; color: white;"><h1 style="margin-top: 28%; font-size: 50px;">Начался сезон королевских гонок</h1></div>
        <div class="slide" style="background-image: url(./photo/5.jpg); background-position-x: 40%; background-position-y: 60%; color: white;"><h1 style="margin-top: 28%; font-size: 50px;">Переход Льюиса в Ferrari</h1></div>

        <div class="indicators">
        <input type="radio" name="slider" id="slide1" class="indicator" checked>
        <input type="radio" name="slider" id="slide2" class="indicator">
        <input type="radio" name="slider" id="slide3" class="indicator">
        <input type="radio" name="slider" id="slide4" class="indicator">
    </div>
</div>
    <div id="prev">&#10094;</div>
    <div id="next">&#10095;</div>
</div>

    <div class="news">
        <?php foreach ($results as $row): ?>
            <div class="news-block">
                <img src="<?php echo $row["img"]; ?>" class="imgNews">
                <h2><?php echo htmlspecialchars($row["name_news"]); ?></h2>
                <p><?php echo htmlspecialchars($row["news"]); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>



</div>
<script src="./scripts/slider.js"></script>
</body>
</html>
