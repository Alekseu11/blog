<?php
require 'lib/bootstrap.php';

$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$error = "";
$email = "";
$password = "";
$password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password !== $password2) {
$error = "Пароли не совпадают.";
} else {
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
$error = "Этот email уже используется.";
} else {
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (email, password, isAdmin) VALUES (?, ?, 0)");
$stmt->bind_param("ss", $email, $hash_password);

if ($stmt->execute()) {
header("Location: /success.php");
exit;
} else {
$error = "Произошла ошибка при создании пользователя.";
}
}

$stmt->close();
}
}

$conn->close();
?>