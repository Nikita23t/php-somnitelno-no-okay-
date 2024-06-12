<!-- Создайте пользовательскую функцию, которая реализует дешифровку текста зашифрованного путём простой замены -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дешифровка текста</title>
</head>
<body>
    <h2>Дешифровка текста</h2>
    <form method="post" action="">
        <label for="text">Введите зашифрованный текст:</label><br>
        <textarea id="text" name="text" rows="4" cols="50"></textarea><br>

        <label for="shift">Введите параметр сдвига (число от 1 до 25):</label><br>
        <input type="number" id="shift" name="shift" min="1" max="25" required><br>

        <input type="submit" name="decrypt" value="Расшифровать">
    </form>

    <?php
    function decrypt_text($text, $shift)
    {
        $alphabet = range("a", "z");
        $shifted_alphabet = array_merge(
            array_slice($alphabet, $shift),
            array_slice($alphabet, 0, $shift)
        );

        $decrypted_text = "";
        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $char_lower = strtolower($char);
                $index = array_search($char_lower, $shifted_alphabet);
                $decrypted_char =
                    $char === strtoupper($char)
                        ? strtoupper($alphabet[$index])
                        : $alphabet[$index];
                $decrypted_text .= $decrypted_char;
            } else {
                $decrypted_text .= $char;
            }
        }

        return $decrypted_text;
    }

    if (isset($_POST["decrypt"])) {
        $text = $_POST["text"];
        $shift = $_POST["shift"];

        if (!is_numeric($shift) || $shift < 1 || $shift > 25) {
            echo "Параметр сдвига должен быть числом от 1 до 25.";
        } else {
            $decrypted_text = decrypt_text($text, $shift);
            echo "<h3>Расшифрованный текст:</h3>";
            echo "<p>$decrypted_text</p>";
        }
    }
    ?>
</body>
</html>
