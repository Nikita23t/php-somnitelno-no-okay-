<?php
$host = "127.0.0.1";
$dbname = "pierrdoon";
$username = "pierrdoon";
$password = "0451";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

$username = isset($_POST["username"]) ? $_POST["username"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;

$query = $pdo->prepare(
    "SELECT * FROM users_login WHERE login_id = :username AND password_user = :password AND status IN ('user', 'inspector', 'admin')"
);
$query->bindParam(":username", $username);
$query->bindParam(":password", $password);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

if ($result) {
    session_start();
    $_SESSION["username"] = $username;

    $status = $result["status"];
    switch ($status) {
        case "user":
            header("Location: user_home.php");
            break;
        case "inspector":
            header("Location: inspector_home.php");
            break;
        case "admin":
            header("Location: admin_home.php");
            break;
        default:
            echo "Unknown status";
    }
} else {
    echo "Login failed. Please check your credentials.";
}
?>
