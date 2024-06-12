<!-- Измените условие предыдущей задачи, объявив методы защищенными и задав им одинаковые имена -->
<?php
trait Trait1
{
    public function method($num)
    {
        return $num;
    }
}

trait Trait2
{
    public function method($num)
    {
        return $num;
    }
}

class MyClass
{
    use Trait1, Trait2 {
        Trait1::method insteadof Trait2;
        Trait2::method as method2;
    }
}

$obj = new MyClass();
$result = $obj->method(10) % $obj->method2(7);
echo "Остаток от деления результата вызова первого метода на результат вызова второго метода: $result";

?>
