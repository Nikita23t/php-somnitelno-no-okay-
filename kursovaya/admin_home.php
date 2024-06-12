<?php
session_start();
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Главная страница гоночной серии</title>
<link rel="stylesheet" href="./styles/adminStyle.css">
</head>
<body>
    <header>
        <div class="mainHeader">
        <div class="meow" style="height: 5px;"></div>
        <div class="headBtn">
            <a href="./index.php"><img src="./photo/logo.jpg" style="height: 80px; width: 80px; box-shadow: 0px 0px 10px 5px #000; margin: 15%;"></a>
            <a href="./index.php" style="text-decoration: none; margin: 3%; color: #000000;">Выход</a>
            <p style="text-decoration: none; margin: 3%; color: #000000;">Здравствуйте <strong><?php echo htmlspecialchars(
                $username
            ); ?></strong></p>
        </div>
    </div>
    </header>

    <div class="main">
    <div class="authForm">
        <p>Добро пожаловать <?php echo htmlspecialchars(
            $username
        ); ?> в админ панель!</p>
    </div>

    <div class="news">
        <div style="width: 100vw; justify-content: center; text-align: center;"><h1>Редактирование соревнований</h1></div>
        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

        $sql = "SELECT  *  FROM race";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            echo "<br>";
            echo '<textarea rows="10" cols="50" class="forms1" style="min-width: 250px; margin: 0px;">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    echo "$key: $value ";
                }
                echo "\n";
            }
            echo "</textarea>";
        } else {
            echo "Записей не найдено.";
        }
        ?>
        <div class="editor">
        <form method="post" class="forms1">
            <p>Для удаления впишите нужный ID соревнования</p>
            <input type="text" name="id">
            <input type="submit" class="button" id="continueButton">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $username = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = isset($_POST["id"]) ? $_POST["id"] : null;

        $sql = "DELETE FROM race WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        ?>

        <form method="post" class="forms1">
            <p>Для добавления соревнования впишите нужный название гонки и дату проведения</p>
            <br>
            <p>Введите название гонки:</p>
            <input type="text" name="race_name">
            <p>Введите дату проведения гонки:</p>
            <input type="text" name="race_date">
            <br>
            <input type="submit" class="button" id="continueButton">
        </form>
        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

        if (!empty($_POST)) {
            if (!empty($_POST["race_name"]) && !empty($_POST["race_date"])) {
                $stmt = $pdo->prepare(
                    "INSERT INTO race (race_name, race_date) VALUES (:race_name, :race_date)"
                );

                $stmt->bindParam(":race_name", $_POST["race_name"]);
                $stmt->bindParam(":race_date", $_POST["race_date"]);
                $stmt->execute();
            }
        }
        ?>
    </div>
    </div>
    <!-- --------------------------- -->
    <div class="news">
        <div style="width: 100vw; justify-content: center; text-align: center;"><h1>Редактирование новостей</h1></div>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

        $sql = "SELECT  *  FROM news";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            echo "<br>";
            echo '<textarea rows="10" cols="50" class="forms1" style="min-width: 250px; margin: 0px;">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    echo "$key: $value ";
                }
                echo "\n";
            }
            echo "</textarea>";
        } else {
            echo "Записей не найдено.";
        }
        ?>
        <div class="editor">
        <form method="post" class="forms1">
            <p>Для удаления впишите нужный ID пользователя</p>
            <input type="text" name="id2">
            <input type="submit" class="button" id="continueButton">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $username = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = isset($_POST["id2"]) ? intval($_POST["id2"]) : null;

        if ($id !== null) {
            $sql = "DELETE FROM news WHERE id = :id2";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id2", $id);
            $stmt->execute();
        }
        ?>

        <form method="post" class="forms1">
            <p>Для добавления пользователя введите заголовок и саму новость</p>
            <br>
            <p>Введите заголовок новости:</p>
            <input type="text" name="title">
            <p>Введите текст новости:</p>
            <input type="text" name="content">
            <p>Введите расположение изображения:</p>
            <input type="text" name="image">
            <br>
            <input type="submit" class="button" id="continueButton">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        try {
            $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

        $title = isset($_POST["title"]) ? $_POST["title"] : null;
        $content = isset($_POST["content"]) ? $_POST["content"] : null;
        $image = isset($_POST["image"]) ? $_POST["image"] : null;

        if ($title !== null && $content !== null && $image !== null) {
            $stmt = $pdo->prepare(
                "INSERT INTO news (name_news, news, img) VALUES (:title, :content, :image)"
            );

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":image", $image);
            $stmt->execute();
        }
        ?>
    </div>
    </div>
    <!-- -------------------- -->
    <div class="news">
        <div style="width: 100vw; justify-content: center; text-align: center;"><h1>Редактирование всех пользователей</h1></div>
        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

        $sql = "SELECT  *  FROM users_login";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            echo "<br>";
            echo '<textarea rows="10" cols="50" class="forms1" style="min-width: 250px; margin: 0px;">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    echo "$key: $value ";
                }
                echo "\n";
            }
            echo "</textarea>";
        } else {
            echo "Записей не найдено.";
        }
        ?>
        <div class="editor">
        <form method="post" class="forms1" style="height: 100%;">
            <p>Для удаления впишите нужный ID участника</p>
            <input type="text" name="id3">
            <input type="submit" class="button" id="continueButton">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $username = "pierrdoon";
        $password = "0451";

        try {
            $pdo = new PDO(
                "pgsql:host=$host;dbname=$dbname",
                $username,
                $password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Проверяем, что форма была отправлена
            $id = isset($_POST["id3"]) ? $_POST["id3"] : null;

            if ($id !== null) {
                // Проверяем, что ID является числом
                $sql = "DELETE FROM users_login WHERE login_id = :id3";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id3", $id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "Запись успешно удалена.";
                } else {
                    echo "Произошла ошибка при удалении записи.";
                }
            } else {
                echo "Неверный ID участника.";
            }
        }
        ?>
    </div>
    </div>
    <!-- -------------------- -->
    <div class="news">
        <div style="width: 100vw; justify-content: center; text-align: center;"><h1>Редактирование участников гонок</h1></div>
        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $user = "pierrdoon";
        $password = "0451";

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

        $sql = "SELECT  *  FROM race_request";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            echo "<br>";
            echo '<textarea rows="10" cols="50" class="forms1" style="min-width: 250px; margin: 0px;">';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    echo "$key: $value ";
                }
                echo "\n";
            }
            echo "</textarea>";
        } else {
            echo "Записей не найдено.";
        }
        ?>
        <div class="editor">
        <form method="post" class="forms1" style="height: 100%;">
            <p>Для удаления впишите нужный ID участника</p>
            <input type="text" name="id4">
            <input type="submit" class="button" id="continueButton">
        </form>

        <?php
        $host = "127.0.0.1";
        $dbname = "pierrdoon";
        $username = "pierrdoon";
        $password = "0451";

        try {
            $pdo = new PDO(
                "pgsql:host=$host;dbname=$dbname",
                $username,
                $password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Проверяем, что форма была отправлена
            $id = isset($_POST["id4"]) ? $_POST["id4"] : null;

            if ($id !== null && ctype_digit($id)) {
                // Проверяем, что ID является числом
                $sql = "DELETE FROM race_request WHERE id = :id4";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id4", $id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "Запись успешно удалена.";
                } else {
                    echo "Произошла ошибка при удалении записи.";
                }
            } else {
                echo "Неверный ID участника.";
            }
        }
        ?>
    </div>
    </div>

</body>
</html>
