<!-- Напишите пользовательскую функцию -->
<?php
function display_arguments(...$args)
{
    foreach ($args as $arg) {
        echo $arg . "<br>";
    }
}

display_arguments("Привет", "Мир", 123);


?>
