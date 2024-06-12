<?php

// Проверяем, была ли отправлена форма
if(isset($_POST['birthdate'])) {
    // Получаем дату рождения пользователя из формы
    $birthdate = $_POST['birthdate'];
    
    // Записываем дату рождения в куки на 1 год
    setcookie('birthdate', $birthdate, time() + 3600 * 24 * 365);
} elseif(isset($_COOKIE['birthdate'])) {
    // Если куки с датой рождения уже есть, используем ее
    $birthdate = $_COOKIE['birthdate'];
}

// Проверяем, есть ли записанная дата рождения
if(isset($birthdate)) {
    // Получаем текущую дату
    $today = strtotime('today');
    
    // Получаем дату рождения из куки
    $birthdate_timestamp = strtotime($birthdate);
    
    // Преобразуем дату рождения в формат "дд/мм/гггг"
    $birthdate_formatted = date('d/m/Y', $birthdate_timestamp);
    
    // Выводим дату рождения пользователя в нужном формате
    echo "Ваша дата рождения: $birthdate_formatted<br>";
    
    // Если день рождения сегодня, выводим поздравительное сообщение
    if(date('m-d', $birthdate_timestamp) === date('m-d', $today)) {
        echo "С Днем Рождения!";
    } else {
        // Вычисляем количество дней до следующего дня рождения
        $next_birthday = strtotime(date('Y') . '-' . date('m-d', $birthdate_timestamp));
        if($next_birthday < $today) {
            $next_birthday = strtotime('+1 year', $next_birthday);
        }
        $days_until_birthday = ceil(($next_birthday - $today) / 86400);
        
        // Выводим количество дней до дня рождения пользователя
        echo "До вашего дня рождения осталось $days_until_birthday дней.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка Дня Рождения</title>
</head>
<body>
    <h2>Введите свою дату рождения</h2>
    <form method="post">
        <label for="birthdate">Дата рождения:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
