<!-- Создайте пользовательскую функцию, которая будет вызывать две другие функции -->
<?php
function sum($a, $b)
{
    return $a + $b;
}

function minus($a, $b)
{
    return $a - $b;
}

function calculate_result($value1, $value2)
{
    $sum_result = sum($value1, $value2);
    $minus_result = minus($value1, $value2);

    $sum_squared = $sum_result * $sum_result;
    $minus_squared = $minus_result * $minus_result;

    echo "Сумма значений $value1 и $value2 = $sum_result.<br>";
    echo "Разность значений $value1 и $value2 = $minus_result.<br>";
    echo "Квадрат значений результатов $sum_result + $minus_result = " .
        ($sum_squared + $minus_squared) .
        ".";
}

calculate_result(1000, 7);


?>
