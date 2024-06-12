<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="./styles/styleAuthPage.css">
</head>
<body style="background-image: url(./photo/wallpaperAuth.jpg); background-repeat: no-repeat; background-size: 100vw;">

<div class="forma">
    <form action="./login.php" method="post" class="form">
        <h1>Вход в аккаунт</h1>
        <img class="img" src="./photo/logo.jpg">
        <br>
        <p>Ваш логин: </p><input type="text" name="username">
        <p>Ваш пароль:</p><input type="password" name="password">
        <input type="submit" class="button" id="continueButton">
    </form>
    <div class="buttons">
        <a href="./index.php"><button class="button" style="width: 100px;">Назад</button></a>
        <a href="./registerForm.php"><button class="button" style="width: 130px;">Регистрация</button></a>
    </div>
</div>
</body>
</html>
