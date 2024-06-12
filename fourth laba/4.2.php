<!-- Нужно разработать класс, который будет подсчитывать общую массу яблок в зависимости от вместимости корзин. -->
<?php
class AppleBasket
{
    const BASKET_COUNT = 9;
    private $basketCapacity;

    public function setBasketCapacity($capacity)
    {
        $this->basketCapacity = $capacity;
    }

    public function getTotalApples()
    {
        return self::BASKET_COUNT * $this->basketCapacity;
    }
}

$basket = new AppleBasket();

echo "Количество корзин: " . AppleBasket::BASKET_COUNT . "<br>";

$basket->setBasketCapacity(15);

echo "Общая масса яблок: " . $basket->getTotalApples() . " кг";

?>
