<?php
$count = 0;
for ($i = 100000; $i <= 999999; $i++) {
    $digits = str_split($i);
    $first_half = array_slice($digits, 0, 3);
    $second_half = array_slice($digits, 3);
    if (array_sum($first_half) == array_sum($second_half)) {
        echo "$i <br>";
        $count++;
    }
}

$total_numbers = 999999 - 100000 + 1;
$percentage = ($count / $total_numbers) * 100;
echo "Общее количество таких чисел: $count <br>";
echo "Процент от общего числа: $percentage%";
?>
