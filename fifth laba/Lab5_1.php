<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>51laba</title>
</head>
<body>
    <div>
        <h1>Введите данные для выполнения запросов</h1>
        <form method="post">
            <label for="task">Выберите задачу:</label>
            <br><br>
                <label><input type="checkbox" name="task" id="task" value="1">Вывести информацию о студентах в возрасте от 25 до 28 лет</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="2">Вывести информацию о студентах N и M</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="3">Вывести информацию о всех студентах, кроме N</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="4">Вывести информацию о всех студентах в возрасте N лет или с количеством баллов = M</label>
                <br>
                <label><input type="checkbox" name="task" id="task" value="5">Вывести информацию о всех студентах в возрасте от 23 лет до 27 лет с баллами от 400 до 800</label>
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
                $query = "SELECT * FROM students WHERE age > 25 AND age <= 28";
                break;
            case "2":
                list($studentN, $studentM) = explode(",", $value);
                $query = "SELECT * FROM students WHERE id = $studentN OR id = $studentM";
                break;
            case "3":
                $query = "SELECT * FROM students WHERE id <> $value";
                break;
            case "4":
                $query = "SELECT * FROM students WHERE age = $value OR bal = $value";
                break;
            case "5":
                $query =
                    "SELECT * FROM students WHERE age >= 23 AND age <= 27 AND bal >= 400 AND bal <= 800";
                break;
            default:
                die("Некорректная задача.");
        }

        $result = pg_query($conn, $query);

        if (!$result) {
            die("Ошибка выполнения запроса: " . pg_last_error($conn));
        }

        echo "<h2>Результат выполнения запроса:</h2>";
        echo "<ul>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<li>ID: {$row["id"]} | Имя: {$row["name"]} | Возраст: {$row["age"]} | Баллы: {$row["bal"]}</li>";
        }
        echo "</ul>";
        pg_close($conn);
        ?>
    </div>
</body>
</html>
