<?php
session_start();

$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
?>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Введите имя">
    <input type="text" name="surname" placeholder="Введите фамилию">
    <input type="password" name="password" placeholder="Введите пароль">
    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Введите email">
    <input type="submit" value="Отправить">
</form>
