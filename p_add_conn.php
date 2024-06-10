<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db_for_cartoon"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $release_date = $_POST["release_date"];
    $imdb = $_POST["imdb"];

    // Prepared statement to insert data
    $stmt = $conn->prepare("INSERT INTO cartoons (name, description, release_date, imdb) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $release_date, $imdb);

    if ($stmt->execute()) {
        echo "New cartoon added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
