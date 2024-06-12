<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>53laba</title>
</head>
<body>
    <div>
        <h1>Введите данные для выполнения запросов</h1>
        <form method="post">
            <label for="task">Выберите задачу:</label>
            <br><br>
                <label><input type="checkbox" name="task" id="task" value="1">Добавьте нового студента с именем N, которому М лет, количество
                баллов Х.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="2">Добавьте двух новых студентов одним запросом: N с количеством
                баллов 900 и возрастом 30, M с количеством баллов 500 и возрастом 31.</label>
                <br>
            <label for="value">Введите новое значение name:</label>
            <input type="text" name="value" id="value">
            <br>
            <label for="value1">Введите новое значение age: </label>
            <input type="text" name="value1" id="value1">
            <br>
            <label for="value1">Введите новое значение bal: </label>
            <input type="text" name="value2" id="value2">
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
        $value2 = isset($_POST["value2"]) ? $_POST["value2"] : null;
        if ($task === null || $value === null) {
            die("Необходимо указать задачу и значение.");
        }

        switch ($task) {
            case "1":
                $query = "INSERT INTO students (name, age, bal) VALUES ('$value', '$value1', '$value2')";
                break;
            case "2":
                $query = "INSERT INTO students (name, age, bal) VALUES ('$value', '30', '900'), ('$value1', '31', '500')";
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
