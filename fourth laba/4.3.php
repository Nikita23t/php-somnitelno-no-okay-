<!-- Создайте абстрактный класс, который будет содержать два -->
<?php
abstract class Car
{
    abstract public function return_car_name();
    abstract public function return_car_price();

    public function return_year($year)
    {
        return "Год выпуска авто: {$year}";
    }
}

class BMW_car extends Car
{
    public function return_car_name()
    {
        return "BMW";
    }

    public function return_car_price()
    {
        return 50000;
    }
}

class MB_car extends Car
{
    public function return_car_name()
    {
        return "Mersedes-benz";
    }

    public function return_car_price()
    {
        return 40000;
    }
}

$bmw = new BMW_car();
echo "Марка автомобиля: " . $bmw->return_car_name() . "<br>";
echo "Цена автомобиля: $" . $bmw->return_car_price() . "<br>";
echo $bmw->return_year(2023) . "<br>";

$MB = new MB_car();
echo "Марка автомобиля: " . $MB->return_car_name() . "<br>";
echo "Цена автомобиля: $" . $MB->return_car_price() . "<br>";
echo $MB->return_year(2024) . "<br>";


?>
