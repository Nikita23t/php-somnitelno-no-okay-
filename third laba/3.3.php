<!-- Создайте пользовательскую функцию сортирующую массив методом пузырька  -->
<html>
<head>
    <title>Сортировка массива</title>
</head>
<body>
    <h2>Сортировка массива</h2>
    <form method="post" action="">
        <label for="array_values">Введите значения массива (через запятую):</label><br>
        <input type="text" id="array_values" name="array_values"><br><br>

        <label for="sort_direction">Выберите направление сортировки:</label>
        <select id="sort_direction" name="sort_direction">
            <option value="asc">От меньшего к большему</option>
            <option value="desc">От большего к меньшему</option>
        </select><br><br>

        <input type="submit" name="sort" value="Отсортировать массив">
    </form>

    <?php
    function bubble_sort($array, $direction = "asc")
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($direction == "asc") {
                    if ($array[$j] > $array[$j + 1]) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                } elseif ($direction == "desc") {
                    if ($array[$j] < $array[$j + 1]) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
        }
        return $array;
    }

    if (isset($_POST["sort"])) {
        $array_values = $_POST["array_values"];
        $sort_direction = $_POST["sort_direction"];

        $array = explode(",", $array_values);
        $array = array_map("trim", $array);

        echo "<h3>Введенный массив:</h3>";
        echo "<ol>";
        foreach ($array as $value) {
            echo "<li>$value</li>";
        }
        echo "</ol>";

        $sorted_array = bubble_sort($array, $sort_direction);

        echo "<h3>Отсортированный массив:</h3>";
        echo "<ol>";
        foreach ($sorted_array as $value) {
            echo "<li>$value</li>";
        }
        echo "</ol>";
    }
    ?>
</body>
</html>
