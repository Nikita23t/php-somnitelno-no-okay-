<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleAuthPage.css">
    <script>
            window.onload = function() {
                document.getElementById("registrationForm").onsubmit = function(event) {
                    // Добавляем код для перенаправления на другую страницу после успешной отправки формы
                    window.location.href = "authPage.php"; // Замените "новая_страница.php" на путь к вашей целевой странице
                }
            };
        </script>

</head>
<body style="background-image: url(./photo/wallpaperAuth.jpg); background-repeat: no-repeat; background-size: 100vw;">

<div class="forma">
    <form id="registrationForm" action="./new_user.php" method="post" class="form">
        <h1>Регистрация</h1>
        <img class="img" src="./photo/logo.jpg">
        <br>
        <p>Ваш новый логин: </p><input type="text" name="username">
        <p>Ваш новый пароль:</p><input type="password" name="password">
        <input type="submit" class="button" id="continueButton">
    </form>
    <div class="buttons">
        <a href="./index.php"><button class="button" style="width: 100px;">Назад</button></a>
        <a href="./authPage.php"><button class="button" style="width: 150px;">Вернуться на вход</button></a>
    </div>
</div>
<script>
        window.onload = function() {
            document.getElementsByClassName("form").onsubmit = function(event) {
                window.location.href = "./authPage.php";
            }
        };
    </script>
</body>
</html>
