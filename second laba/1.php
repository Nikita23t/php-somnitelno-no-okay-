<form method="post">
    <label>Введите значение n:</label>
    <input type="number" name="n" required>
    <br>
    <label>Введите элементы массива через запятую:</label>
    <input type="text" name="numbers" required>
    <br>
    <button type="submit" name="submit">Работаем</button>
</form>

<?php
$n = intval($_POST["n"]);
// первое задание
echo "<br>";

for ($i = 0; $i < $n; $i++) {
    echo "meow <br>";
}

// второе задание
echo "<br>";

$sum = 0;
for ($i = 1; $sum <= 1000; $i += $i) {
    $sum += 23;
    echo "$sum ";
}
echo "<br>Сумма последовательности: $sum";

// третье задание
echo "<br><br>";

for ($i = 0; $i <= 3000; $i++) {
    if ($i % $n == 0 && strpos($i, "5") !== false) {
        echo "$i ";
    }
}
// четвертое задание
echo "<br><br>";

$colors = ["red", "blue", "green", "yellow", "orange"];
echo "<table>";
for ($i = 0; $i < $n; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $n; $j++) {
        $random_color = $colors[array_rand($colors)];
        echo "<td style='background-color: $random_color;'></td>";
    }
    echo "</tr>";
}
echo "</table>";

// пятое задание
echo "<br>";
$newN = $n + 20;
$array = [];
for ($i = 0; $i < 10; $i++) {
    $array[] = mt_rand(-$newN, $newN);
}

echo "Исходный массив: ";
print_r($array);
echo "<br>";

for ($i = 0; $i < count($array) - 1; $i++) {
    for ($j = $i + 1; $j < count($array); $j++) {
        if ($array[$i] > $array[$j]) {
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }
}

echo "Отсортированный массив: ";
print_r($array);

// седьмое задание
echo "<br><br>";

$colors = [
    "Красный" => "#FF0000",
    "Зеленый" => "#00FF00",
    "Синий" => "#0000FF",
    "Желтый" => "#FFFF00",
    "Фиолетовый" => "#800080",
    "Белый" => "#FFFFFF",
    "Черный" => "#000000",
    "Оранжевый" => "#FFA500",
    "Розовый" => "#FFC0CB",
    "Серый" => "#808080",
    "Бирюзовый" => "#40E0D0",
    "Коричневый" => "#A52A2A",
    "Золотой" => "#FFD700",
    "Серебряный" => "#C0C0C0",
    "Бронзовый" => "#CD7F32",
    "Лавандовый" => "#E6E6FA",
    "Индиго" => "#4B0082",
    "Персиковый" => "#FFDAB9",
    "Морская волна" => "#2E8B57",
    "Слоновая кость" => "#FFFFF0",
    "Салатовый" => "#7CFC00",
    "Индиго" => "#4B0082",
    "Фуксия" => "#FF00FF",
    "Темно-синий" => "#00008B",
    "Светло-зеленый" => "#90EE90",
    "Сливовый" => "#DDA0DD",
    "Медный" => "#B87333",
    "Лососевый" => "#FA8072",
    "Мятный" => "#98FF98",
    "Оливковый" => "#808000",
    "Сапфировый" => "#0F52BA",
    "Бисквитный" => "#FFE4C4",
    "Изумрудный" => "#50C878",
    "Темно-красный" => "#8B0000",
    "Темно-зеленый" => "#006400",
    "Светло-серый" => "#D3D3D3",
    "Темно-серый" => "#A9A9A9",
    "Мандариновый" => "#FFA07A",
    "Кобальтовый" => "#0047AB",
    "Коралловый" => "#FF7F50",
    "Лимонный" => "#FFFACD",
    "Аметистовый" => "#9966CC",
    "Латунный" => "#B5A642",
    "Кремовый" => "#FFFDD0",
    "Пурпурный" => "#800080",
    "Темно-коричневый" => "#654321",
    "Лазурный" => "#007FFF",
    "Клюквенный" => "#DC143C",
    "Малиновый" => "#D3125C",
    "Мурасаки" => "#8A2BE2",
    "Пастельно-розовый" => "#FFD1DC",
    "Орхидея" => "#DA70D6",
    "Темно-зеленый" => "#013220",
    "Хаки" => "#F0E68C",
    "Карамельный" => "#DAA520",
    "Песочный" => "#C2B280",
    "Светло-синий" => "#ADD8E6",
    "Бархатный" => "#9400D3",
    "Бежевый" => "#F5F5DC",
    "Шоколадный" => "#D2691E",
    "Карминовый" => "#960018",
    "Амарантовый" => "#E52B50",
    "Малиновый" => "#FF5C8D",
    "Бургундский" => "#800020",
    "Голубой" => "#0000FF",
    "Сливочный" => "#FFFFF0",
    "Баклажанный" => "#9932CC",
    "Мандариновый" => "#FFA500",
    "Пурпурный" => "#800080",
    "Бежевый" => "#F5F5DC",
    "Кремовый" => "#FFFDD0",
    "Темно-зеленый" => "#006400",
    "Слоновая кость" => "#FFFFF0",
    "Кобальтовый" => "#0047AB",
    "Сапфировый" => "#0F52BA",
    "Фуксия" => "#FF00FF",
    "Темно-красный" => "#8B0000",
    "Сливовый" => "#DDA0DD",
    "Кремовый" => "#FFFDD0",
    "Кобальтовый" => "#0047AB",
    "Лососевый" => "#FA8072",
    "Сливовый" => "#DDA0DD",
    "Медный" => "#B87333",
    "Темно-красный" => "#8B0000",
    "Фиолетовый" => "#800080",
    "Кремовый" => "#FFFDD0",
    "Лососевый" => "#FA8072",
    "Песочный" => "#C2B280",
    "Сливовый" => "#DDA0DD",
    "Малиновый" => "#D3125C",
    "Шоколадный" => "#D2691E",
    "Сливовый" => "#DDA0DD",
    "Лососевый" => "#FA8072",
    "Пурпурный" => "#800080",
    "Медный" => "#B87333",
    "Сливовый" => "#DDA0DD",
];

//восьмое задание
echo "<br><br>";

$result = [];

for ($i = 1; $i <= $n; $i++) {
    $result[] = $i * $i;
}

echo "Полученный массив:<br>";
foreach ($result as $value) {
    echo $value . " ";
}

//девятое задание
echo "<br><br>";

if (isset($_POST["submit"])) {
    $numbers_str = $_POST["numbers"];
    $numbers = explode(",", $numbers_str);
    $numbers = array_map("intval", $numbers);

    $sum_with_functions = array_sum($numbers);
    $product_with_functions = array_product($numbers);

    $sum_without_functions = 0;
    $product_without_functions = 1;
    foreach ($numbers as $num) {
        $sum_without_functions += $num;
        $product_without_functions *= $num;
    }

    echo "Массив: " . implode(", ", $numbers) . "<br>";
    echo "Сумма элементов (с функциями): $sum_with_functions, произведение элементов (с функциями): $product_with_functions <br>";
    echo "Сумма элементов (без функций): $sum_without_functions, произведение элементов (без функций): $product_without_functions";
}

// десятое задание
echo "<br><br>";

$random_array = [];
for ($i = 0; $i < 100; $i++) {
    $random_array[] = rand(0, 20);
}

echo "Исходный массив:<br>";
print_r($random_array);
echo "<br><br>";

$repeated_elements = [];
$counts = array_count_values($random_array);
foreach ($counts as $value => $count) {
    if ($count > 1) {
        $repeated_elements[] = $value;
    }
}

if (!empty($repeated_indexes)) {
    echo "Номера элементов с повторяющимися значениями: ";
    foreach ($repeated_indexes as $index) {
        echo $index . " ";
    }
    echo "<br>";
} else {
    echo "В исходном массиве нет повторяющихся элементов.<br>";
}

$unique_array = array_unique($random_array);

echo "Массив с уникальными значениями:<br>";
print_r($unique_array);

//одиннадцатое задание
echo "<br><br>";

$ar1 = range(1, 21, 2);
$ar2 = range(2, 22, 2);
$merged_array = array_merge($ar1, $ar2);
sort($merged_array);
echo "Упорядоченный массив: " . implode(", ", $merged_array);
?>

<table border="1">
    <tr>
        <th>Цвет</th>
        <th>Значение RGB</th>
    </tr>
    <?php foreach ($colors as $color => $rgb) { ?>
        <tr>
            <td style="background-color: <?php echo $rgb; ?>"><?php echo $color; ?></td>
            <td><?php echo $rgb; ?></td>
        </tr>
    <?php } ?>
</table>
