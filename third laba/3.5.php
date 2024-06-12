<!-- Создайте пользовательскую функцию, которая будет выводить количество дней в выбранном месяце -->
<html>
<head>
    <title>Количество дней в месяце</title>
</head>
<body>
    <h2>Количество дней в месяце</h2>
    <form method="post" action="">
        <label for="month">Выберите месяц:</label>
        <select id="month" name="month">
            <option value="1">Январь</option>
            <option value="2">Февраль</option>
            <option value="3">Март</option>
            <option value="4">Апрель</option>
            <option value="5">Май</option>
            <option value="6">Июнь</option>
            <option value="7">Июль</option>
            <option value="8">Август</option>
            <option value="9">Сентябрь</option>
            <option value="10">Октябрь</option>
            <option value="11">Ноябрь</option>
            <option value="12">Декабрь</option>
        </select><br><br>

        <input type="submit" name="submit" value="Показать количество дней">
    </form>

    <?php
    function days_in_month($month)
    {
        $days = cal_days_in_month(CAL_GREGORIAN, $month, date("Y"));
        return $days;
    }

    if (isset($_POST["submit"])) {
        $selected_month = $_POST["month"];

        $months = [
            1 => "Январь",
            2 => "Февраль",
            3 => "Март",
            4 => "Апрель",
            5 => "Май",
            6 => "Июнь",
            7 => "Июль",
            8 => "Август",
            9 => "Сентябрь",
            10 => "Октябрь",
            11 => "Ноябрь",
            12 => "Декабрь",
        ];

        $days_count = days_in_month($selected_month);

        echo "Месяц: " .
            $months[$selected_month] .
            " - количество дней: " .
            $days_count;
    }
    ?>
</body>
</html>
