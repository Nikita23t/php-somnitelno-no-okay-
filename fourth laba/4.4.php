<!-- Объявите два интерфейса, а в каждом из них по дному общедоступному методу. Реализуйте оба интерфейса в классе. -->
<?php
interface Interface1
{
    public function method1($num);
}

interface Interface2
{
    public function method2($num);
}

class MyClass implements Interface1, Interface2
{
    public function method1($num)
    {
        return $num;
    }

    public function method2($num)
    {
        return $num;
    }
}

$obj = new MyClass();
$result = $obj->method1(10) % $obj->method2(7);
echo "Остаток от деления результата вызова первого метода на результат вызова второго метода: $result";

?>
