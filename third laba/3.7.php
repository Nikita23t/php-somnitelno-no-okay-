<!-- Создайте пользовательскую функцию, которая будет, с определённой периодичностью, выводить на экран в элемент div -->
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Текущее время с изменением цвета фона</title>
<style>

    .red { background-color: #FF5733; }
    .green { background-color: #33FF77; }
    .blue { background-color: #3399FF; }
    .yellow { background-color: #FFFF33; }
</style>
</head>
<body>

<div id="time" style="font-size: 24px;"></div>

<script>
function updateTime() {
    var currentDate = new Date();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();
    var seconds = currentDate.getSeconds();
    var timeString = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);
    document.getElementById("time").innerHTML = "Текущее время: " + timeString;


    var colorClass = "";
    if (hours >= 0 && hours < 6) {
        colorClass = "red";
    } else if (hours >= 12 && hours < 18) {
        colorClass = "green";
    } else if (hours >= 6 && hours < 12) {
        colorClass = "blue";
    } else {
        colorClass = "yellow";
    }
    document.getElementById("time").className = colorClass;
}

function padZero(num) {
    return (num < 10 ? "0" : "") + num;
}


setInterval(updateTime, 1000);


updateTime();
</script>

</body>
</html>
