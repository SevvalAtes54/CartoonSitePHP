<?php
session_start();

// Oturum kontrolü yapılabilir, gelen kullanıcının kim olduğu vb. işlemler burada gerçekleştirilebilir

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eğer POST isteği yapıldıysa ve "message" adında bir değişken varsa
    if (isset($_POST["message"])) {
        // Mesajı al
        $message = $_POST["message"];

        // Burada mesajı işleyebilirsiniz, örneğin veritabanına kaydedebilirsiniz
        // Örneğin:
        // Veritabanı bağlantısını oluşturun (bu kısmı kendi veritabanınıza göre ayarlayın)
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "your_database";

        // Veritabanı bağlantısını oluşturma
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol etme
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Gönderici ve alıcı bilgilerini ayarlayın (örneğin, oturum açmış kullanıcı ve admin)
        $sender = $_SESSION["fullName"]; // Gönderici oturum açmış kullanıcı
        $receiver = "Sevval ates(admin)"; // Sabit alıcı, admin

        // Mesajı veritabanına ekleme
        $sql = "INSERT INTO direct_messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Başarılı bir şekilde eklendiğinde başarılı yanıt döndür
            echo "Message sent successfully!";
        } else {
            // Hata durumunda hata mesajını döndür
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Veritabanı bağlantısını kapatma
        $conn->close();
    }
}
?>
