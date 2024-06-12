 <!-- Создайте пользовательскую функцию, которая поочерёдно изменит цвет вона страницы или какого-либо элемента -->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Color Changer</title>
</head>
<body>

<div id="myElement" style="width: 100px; height: 100px; border: 1px solid black;"></div>

<form method="post" action="">
    <label for="speed">Скорость изменения (в миллисекундах):</label>
    <input type="number" id="speed" name="speed" value="1000" min="100" step="100">
    <br>
    <label for="color1">Цвет 1:</label>
    <input type="color" id="color1" name="color1" value="#ff0000">
    <br>
    <label for="color2">Цвет 2:</label>
    <input type="color" id="color2" name="color2" value="#00ff00">
    <br>
    <label for="color3">Цвет 3:</label>
    <input type="color" id="color3" name="color3" value="#0000ff">
    <br>
    <input type="submit" name="submit" value="Применить">
</form>

<?php if (isset($_POST["submit"])) {
    $colors = json_encode([
        $_POST["color1"],
        $_POST["color2"],
        $_POST["color3"],
    ]);
    $element_id = "myElement";
    $speed = $_POST["speed"];

    echo "<script>";
    echo "var colors = $colors;";
    echo "var speed = $speed;";
    echo "var element = document.getElementById('$element_id');";
    echo "var currentColorIndex = 0;";
    echo "function changeColor() {";
    echo "element.style.backgroundColor = colors[currentColorIndex];";
    echo "if (++currentColorIndex >= colors.length) currentColorIndex = 0;";
    echo "setTimeout(changeColor, speed);";
    echo "}";
    echo "changeColor();";
    echo "</script>";
} ?>

</body>
</html>
