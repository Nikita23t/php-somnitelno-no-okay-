<!-- Создайте переменную и присвойте ей анонимный класс, в котором определите два общедоступных свойства, одно защищенное и одно закрытое. -->
<?php
$anonymousClass = new class {
    public $publicProperty1 = "Public Property 1";
    public $publicProperty2 = "Public Property 2";
    protected $protectedProperty = "Protected Property";
    private $privateProperty = "Private Property";
};

foreach ($anonymousClass as $property => $value) {
    echo "$property: $value<br>";
}

?>
