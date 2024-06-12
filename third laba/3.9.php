<!-- Создайте пользовательскую функцию, которая реализует шифровку текста путём простой замены -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Простая замена</title>
</head>
<body>
    <h2>Шифрование текста методом простой замены</h2>
    <form method="post" action="">
        <label for="input_text">Введите текст для шифрования:</label><br>
        <textarea id="input_text" name="input_text" rows="4" cols="50"></textarea><br><br>
        <label for="shift">Настройте параметр сдвига (от 1 до 25):</label><br>
        <input type="number" id="shift" name="shift" min="1" max="25" value="3"><br><br>
        <input type="submit" name="encrypt" value="Зашифровать">
    </form>

    <?php
    function simple_substitution_cipher($text, $shift)
    {
        $result = "";
        $text = strtolower($text);
        $alphabet = "abcdefghijklmnopqrstuvwxyz";

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $pos = strpos($alphabet, $char);
            if ($pos !== false) {
                $new_pos = ($pos + $shift) % 26;
                $result .= $alphabet[$new_pos];
            } else {
                $result .= $char;
            }
        }

        return $result;
    }

    if (isset($_POST["encrypt"])) {
        $input_text = $_POST["input_text"];
        $shift = intval($_POST["shift"]);

        $encrypted_text = simple_substitution_cipher($input_text, $shift);

        echo "<h3>Зашифрованный текст:</h3>";
        echo "<p>$encrypted_text</p>";
    }
    ?>
</body>
</html>
