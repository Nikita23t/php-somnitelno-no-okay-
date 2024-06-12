<!-- Создайте класс, в котором задайте константу, общедоступные свойство и метод класса -->
<?php
class MyClass
{
    const MY_CONSTANT = 10;
    public $myProperty = 20;

    public function myMethod()
    {
        echo "Это сообщение из метода класса.";
    }
}

$myObject = new MyClass();

$myObject->myMethod();
echo "<br>";

$sum = MyClass::MY_CONSTANT + $myObject->myProperty;
echo "Сумма значений константы и свойства: " . $sum;


?>
