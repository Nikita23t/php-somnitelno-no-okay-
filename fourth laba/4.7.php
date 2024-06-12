<!-- Присвойте переменной анонимный класс. В классе объявите закрытое свойство, но не инициализируйте его -->
<?php
$anonClass = new class {
    private $privateProperty;
    protected $protectedProperty;
    public $publicProperty;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        if (!isset($this->$name)) {
            echo "Свойство $name не инициализировано.<br>";
        }
        return $this->$name;
    }
};

echo "Значение закрытого свойства: " . $anonClass->privateProperty . "<br>";

$anonClass->privateProperty = "Private Value";
$anonClass->protectedProperty = "Protected Value";
$anonClass->publicProperty = "Public Value";

echo "Значение закрытого свойства: " . $anonClass->privateProperty . "<br>";
echo "Значение защищенного свойства: " . $anonClass->protectedProperty . "<br>";
echo "Значение общедоступного свойства: " . $anonClass->publicProperty . "<br>";

?>
