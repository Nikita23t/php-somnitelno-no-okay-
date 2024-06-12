<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>54laba</title>
</head>
<body>
    <div>
        <h1>Введите данные для выполнения запросов</h1>
        <form method="post">
            <label for="task">Выберите задачу:</label>
            <br><br>
                <label><input type="checkbox" name="task" id="task" value="1">Удалите работника с id=N.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="2">Удалите студента с именем N.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="3">Удалите всех студентов, возраст которых N лет.</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="4">Верните таблицу students в исходное состояние (произведите е
                отчистку).</label>
            <br>
            <label for="value">Введите значение (N, M и т.д.):</label>
            <input type="text" name="value" id="value">
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
        if ($task === null || $value === null) {
            die("Необходимо указать задачу и значение.");
        }

        switch ($task) {
            case "1":
                $query = "DELETE FROM students WHERE id ='$value'";
                break;
            case "2":
                $query = "DELETE FROM students WHERE name = '$value'";
                break;
            case "3":
                $query = "DELETE FROM students WHERE age = '$value'";
                break;
            case "4":
                $query =
                    "INSERT INTO students (name, age, bal) VALUES ('Дима', '23', '400'), ('Петя', '25', '500'), ('Вася', '23', '500'), ('Коля', '30', '1000'), ('Иван', '27', '500'),  ('Кирилл', '28', '1000'),";
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
