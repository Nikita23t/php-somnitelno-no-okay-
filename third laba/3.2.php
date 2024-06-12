<!-- калькулятор -->
<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
    <h2>Калькулятор</h2>
    <form method="post" action="">
        <label for="value1">Значение 1:</label>
        <input type="text" id="value1" name="value1"><br><br>

        <label for="value2">Значение 2:</label>
        <input type="text" id="value2" name="value2"><br><br>

        <label for="operation">Выберите операцию:</label>
        <select id="operation" name="operation">
            <option value="*">Произведение</option>
            <option value="/">Деление</option>
            <option value="-">Вычитание</option>
            <option value="+">Сложение</option>
        </select><br><br>

        <input type="submit" name="calculate" value="Выполнить операцию">
    </form>

    <?php
    function calculate_operation($value1, $value2, $operation)
    {
        if (!is_numeric($value1) || !is_numeric($value2)) {
            echo "Ошибка: Введите числовые значения для операндов.";
            return;
        }

        switch ($operation) {
            case "*":
                $result = $value1 * $value2;
                break;
            case "/":
                if ($value2 != 0) {
                    $result = $value1 / $value2;
                } else {
                    echo "Ошибка: Нельзя делить на ноль.";
                    return;
                }
                break;
            case "-":
                $result = $value1 - $value2;
                break;
            case "+":
                $result = $value1 + $value2;
                break;
            default:
                echo "Ошибка: Некорректная операция.";
                return;
        }

        echo "Результат: $value1 $operation $value2 = $result";
    }

    if (isset($_POST["calculate"])) {
        $value1 = $_POST["value1"];
        $value2 = $_POST["value2"];
        $operation = $_POST["operation"];

        calculate_operation($value1, $value2, $operation);
    }
    ?>
</body>
</html>
