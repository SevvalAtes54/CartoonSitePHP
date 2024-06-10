<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db_for_cartoon"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    
    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT fullName, email, pass, yetki FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Kullanıcı bulundu, şifreyi kontrol et
        $row = $result->fetch_assoc();
        $stored_password = $row["pass"];

        if (password_verify($password, $stored_password)) {
            // Şifre doğru, oturumu başlat
            $fullName = $row["fullName"];
            $email = $row["email"];
            $yetki = $row["yetki"];

            $_SESSION["fullName"] = $fullName;
            $_SESSION["email"] = $email;
            $_SESSION["yetki"] = $yetki;
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit();
        } else {
            // Şifre yanlış
            $_SESSION["login"] = false;
            $login_error = "Invalid email or password.";
            echo '<script>alert("'.$login_error.'");</script>';
            header("Location: login_page.php");
            exit();
        }
    } else { 
        // Kullanıcı bulunamadı
        $_SESSION["login"] = false;
        $login_error = "Invalid email or password.";
        echo '<script>alert("'.$login_error.'");</script>';
        header("Location: login_page.php");
        exit();
    }
    $stmt->close();
}

$conn->close();
?>