<?php
session_start();

if (!isset($_SESSION['phonebook'])) {
    $_SESSION['phonebook'] = array(
        "Иванов" => "123456789",
        "Петров" => "987654321"
    );
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $_SESSION['phonebook'][$name] = $phone;
}

if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];
    foreach ($_SESSION['phonebook'] as $name => $phone) {
        if ($name == $search_term || $phone == $search_term) {
            echo "ФИО: $name, Телефон: $phone <br>";
        }
    }
}
?>


<form method="post">
    <label>ФИО:</label>
    <input type="text" name="name" required>
    <label>Телефон:</label>
    <input type="text" name="phone" required>
    <button type="submit" name="submit">Добавить запись</button>
</form>

<form method="post">
    <label>Поиск по ФИО или телефону:</label>
    <input type="text" name="search_term" required>
    <button type="submit" name="search">Найти</button>
</form>