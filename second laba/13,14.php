<?php
$array = array(
    "ford" => "focus",
    "toyota" => "camry",
    "audi" => "s8",
    "bmw" => "x5",
    "volkswagen" => "golf",
    "lada" => "vesta",
    "vaz" => "gazele",
    "haval" => "h9",
    "mazda" => "rx-7",
    "honda" => "civic",
    "dodge" => "charger",
    "porsche" => "gt3 rs",
    "scoda" => "octavia",
    "nissan" => "z350",
);

//14
foreach($array as $key => $value){
    echo "<div style='border: 1px solid black;'>$key $value</div>";
}

//13
if(isset($_POST['submit'])){
    $search_term = strtolower($_POST['search_term']);
    foreach($array as $word => $translation){
        if(strpos($word, $search_term) !== false || strpos($translation, $search_term) !== false){
            echo "$word $translation <br>";
        }
    }
}
?>


<form method="post">
    <label>Введите поисковую фразу:</label>
    <input type="text" name="search_term" required>
    <button type="submit" name="submit">Поиск</button>
</form>