<?php
session_start();

$host = "127.0.0.1";
$dbname = "pierrdoon";
$username = "pierrdoon";
$password = "0451";
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$name = $_SESSION["username"];
$query = "SELECT race_name FROM race";
$stmt = $pdo->prepare($query);
$stmt->execute();
$races = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raceName = $_POST["race_name"];

    $query = "INSERT INTO race_request (race, name_racer) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$raceName, $name]);
}
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
            <a href="./user_home.php" style="text-decoration: none; margin: 3%; color: #000000;">Страница пользователя</a>
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
        <h1>Все допустимые записи на соревнования: </h1>
    </div>

<div id="news2">

        <?php foreach ($races as $race): ?>
            <div class="news-block2">
            <h2><?php echo $race["race_name"]; ?></h2>
            <form method="post" action="">
                <input type="hidden" name="race_name" value="<?php echo htmlspecialchars(
                    $race["race_name"]
                ); ?>">
                <input type="submit" value="Зарегистрироваться" class="btnUser">
            </form>
            </div>
        <?php endforeach; ?>
</div>


</div>



</div>
</body>
</html>
