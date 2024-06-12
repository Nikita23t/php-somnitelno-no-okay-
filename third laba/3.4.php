<!-- Напишите пользовательскую функцию производящую поиск вхождения набранных символов в текст -->
<!DOCTYPE html>
<html>
<head>
    <title>Поиск вхождения символов</title>
</head>
<body>
    <h2>Поиск вхождения символов</h2>
    <form method="post" action="">
        <label for="text">Введите текст:</label><br>
        <textarea id="text" name="text" rows="4" cols="50"></textarea><br><br>

        <label for="search_chars">Введите символы для поиска:</label><br>
        <input type="text" id="search_chars" name="search_chars"><br><br>

        <input type="submit" name="search" value="Выполнить поиск">
    </form>

    <?php
    function search_characters($text, $search_chars)
    {
        $pattern = "/\b\w*" . preg_quote($search_chars) . "\w*\b/i";
        if (preg_match($pattern, $text, $matches)) {
            $before = preg_replace(
                "/" . preg_quote($search_chars) . "/i",
                '<strong>$0</strong>',
                $matches[0]
            );
            $after = preg_replace(
                "/" . preg_quote($search_chars) . "/i",
                '<strong>$0</strong>',
                $matches[0]
            );
            echo "Совпадение есть: $before - символы которые совпали - $after.";
        } else {
            echo "Совпадений не обнаружено.";
        }
    }

    if (isset($_POST["search"])) {
        $text = $_POST["text"];
        $search_chars = $_POST["search_chars"];

        search_characters($text, $search_chars);
    }
    ?>
</body>
</html>
