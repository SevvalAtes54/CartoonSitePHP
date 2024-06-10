<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db_for_cartoon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$yetki = "2";
$fullName = $_POST["fullName"];
$email = $_POST["email"];
$pass = $_POST["pass"];

// Şifreyi hashle
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (yetki, fullName, email, pass) VALUES (?, ?, ?, ?)");

// Bağlama işlemleri
$stmt->bind_param("ssss", $yetki, $fullName, $email, $hashed_pass);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
