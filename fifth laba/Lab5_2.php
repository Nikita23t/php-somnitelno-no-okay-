<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>52laba</title>
</head>
<body>
    <div>
        <h1>Введите данные для выполнения запросов</h1>
        <form method="post">
            <label for="task">Выберите задачу:</label>
            <br><br>
                <label><input type="checkbox" name="task" id="task" value="1">Измените студенту N количество баллов на M.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="2">Измените студенту с id = N возраст M лет.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="3">Всем студентам, у которых количество баллов N сделайте их на 100 больше.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="4">Студентам с id больше 2 и меньше 5 включительно поставьте возраст 20.</label>
            <br>
            <label for="value">Введите значение (N, M и т.д.):</label>
            <input type="text" name="value" id="value">
            <br>
            <label for="value1">Введите новое значение: </label>
            <input type="text" name="value1" id="value1">
            <br>
            <input type="submit" value="Выполнить">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "root";
        $conn = pg_connect(
            "host=$host dbname=$dbname user=$user password=$password"
        );
        if (!$conn) {
            echo "Ошибка подключения к базе данных.";
            exit();
        }

        $task = isset($_POST["task"]) ? $_POST["task"] : null;
        $value = isset($_POST["value"]) ? $_POST["value"] : null;
        $value1 = isset($_POST["value1"]) ? $_POST["value1"] : null;
        if ($task === null || $value === null) {
            die("Необходимо указать задачу и значение.");
        }

        switch ($task) {
            case "1":
                $query = "UPDATE students SET bal = $value1 WHERE id = $value";
                break;
            case "2":
                $query = "UPDATE students SET age = $value1 WHERE id = $value";
                break;
            case "3":
                $query = "UPDATE students SET bal = bal + 100 WHERE bal = $value";
                break;
            case "4":
                $query =
                    "UPDATE students SET age = 20 WHERE id BETWEEN 3 AND 5";
                break;
            default:
                die("Некорректная задача.");
        }

        $result = pg_query($conn, $query);
        if (!$result) {
            die("Ошибка выполнения запроса: " . pg_last_error($conn));
        }
        echo "<h2>Запрос выполнен, смотрите в таблицу</h2>";
        pg_close($conn);
        ?>
    </div>
</body>
</html>
